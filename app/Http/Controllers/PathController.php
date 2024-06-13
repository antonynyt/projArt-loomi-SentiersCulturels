<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\PathFavorite;
use App\Models\PathHistory;
use App\Models\Poi;
use App\Models\PoiHistory;
use App\Models\Theme;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PathController extends Controller
{
    private function formatTime($seconds)
    {
        $interval = CarbonInterval::seconds($seconds)->cascade();
        if ($interval->h == 0) {
            return $interval->format('%imin');
        }
        return $interval->format('%hh%I');
    }
    private function formatGeoJson($features)
    {
        $geojson = [
            'type' => 'FeatureCollection',
            'features' => $features->map(function ($feature) {
                return [
                    'type' => 'Feature',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [$feature->long, $feature->lat],
                    ],
                    'properties' => [
                        'id' => $feature->id,
                        'name' => $feature->title,
                        'description' => $feature->descr,
                        'type' => $feature->type,
                        'thumbnail' => $feature->thumbnail,
                        'location' => $feature->location,
                        'infos' => [
                            'distance' => !empty($feature->distance) ? ($feature->distance < 1000 ? $feature->distance . ' m' : round($feature->distance / 1000, 1) . ' km') : '',
                            'duration' => !empty($feature->duration) ? $this->formatTime($feature->duration) : '',
                            'ascent' => !empty($feature->ascent) ? ($feature->ascent < 1000 ? $feature->ascent . ' m' : round($feature->ascent / 1000, 1) . ' km') : '',
                            'type' => $feature->type,
                        ]
                    ],
                ];
            }),
        ];

        return json_encode($geojson);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(string $theme)
    {
        $themeExist = Theme::where('title', $theme)->first();
        if ($themeExist === null) {
            return abort(404);
        }

        $paths = Path::where('theme_id', Theme::where('title', $theme)->first()->id)->get();
        $paths->each(function ($path) {
            $path->type = 'path';
            $path->long = $path->pois->first()->long;
            $path->lat = $path->pois->first()->lat;
            $path->thumbnail = Poi::with('photos')->find($path->pois->first()->id)->photos->first()->link;
            $path->location = trim(preg_replace('/\d/', '', explode(',', Poi::all()->find($path->pois->first()->id)->adress_label)[1]));
        });

        return Inertia::render('Details/PathList', [
            'title' => "Sentiers $themeExist->title",
            'items' => $paths,
        ]);
        
    }

    /**
     * Display related paths to POI
     */

    public function related(int $id) {
        $poi = Poi::find($id);

        if ($poi === null) {
            return abort(404);
        }

        $paths = $poi->paths;
        $paths->each(function ($path) {
            $path->type = 'path';
            $path->long = $path->pois->first()->long;
            $path->lat = $path->pois->first()->lat;
            $path->thumbnail = Poi::with('photos')->find($path->pois->first()->id)->photos->first()->link;
            $path->location = trim(preg_replace('/\d/', '', explode(',', Poi::all()->find($path->pois->first()->id)->adress_label)[1]));
        });

        return Inertia::render('Details/PathList', [
            'title' => 'Sentiers liés',
            'items' => $paths,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $path = Path::with(['pois', 'links'])->find($id);

        if ($path === null) {
            return abort(404);
        }

        $pois = $path->pois;
        $pois->each(function ($poi) {
            $poi->pivot_position = $poi->pivot->position;
            $poi->photos = Poi::with('photos')->find($poi->id)->photos->first();
        });

        //order path by pivot position
        $path->pois = $pois->sortBy('pivot_position')->values();

        $path->location = Poi::all()->find($path->pois->first()->id)->adress_label;

        $infos = [
            'id' => $path->id,
            'title' => $path->title,
            'description' => $path->descr,
            'theme' => Theme::find($path->theme_id)->title,
            'themeIcon' => Theme::find($path->theme_id)->icon,
            'location' => trim(preg_replace('/\d/', '', explode(',', $path->location)[1])),
            'distance' => !empty($path->distance) ? ($path->distance < 1000 ? $path->distance . ' m' : round($path->distance / 1000, 1) . ' km') : '',
            'duration' => !empty($path->duration) ? $this->formatTime($path->duration) : '',
            'ascent' => !empty($path->ascent) ? ($path->ascent < 1000 ? $path->ascent . ' m' : round($path->ascent / 1000, 1) . ' km') : '',
            'difficulty' => $path->difficulty,
            'pois' => $path->pois->map(function ($poi) {
                return [
                    'id' => $poi->id,
                    'title' => $poi->title,
                    'description' => $poi->short_descr,
                    'photos' => $poi->photos, // include the photos array
                    'pivot_position' => $poi->pivot_position,
                    'lat' => $poi->lat,
                    'long' => $poi->long,
                ];
            })->toArray(),
            'is_handicap_accessible' => $path->is_handicap_accessible,
            'parkings' => empty(!$path->links) ? $path->links->toArray() : null,
        ];

        // detect if liked
        $liked = false;
        if (auth()->check()) {
            $user = auth()->user();
            $liked = PathFavorite::where('user_id', $user->id)->where('path_id', $path->id)->first() ? true : false;
        }

        // detect if done
        $done = false;
        if (auth()->check()) {
            $user = auth()->user();
            $done = PathHistory::where('user_id', $user->id)->where('path_id', $path->id)->first() ? true : false;
        }

        return Inertia::render('Details', [
            'infos' => $infos,
            'type' => 'path',
            'liked' => $liked,
            'done' => $done,
        ]);
    }
}
