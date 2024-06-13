<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\PathFavorite;
use App\Models\Poi;
use App\Models\Theme;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Review;
use App\Models\Link;
use App\Models\PathHistory;

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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $path = Path::with(['pois', 'links'])->find($id);

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

        // dd($infos);

        return Inertia::render('Details', [
            'infos' => $infos,
            'type' => 'path',
            'liked' => $liked,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PathFavorite::where('path_id', $id)->delete();
        PathHistory::where('path_id', $id)->delete();
        Review::where('path_id', $id)->delete();
        Link::where('path_id', $id)->delete();
        $path = Path::find($id);
        $path->pois()->detach();
        Path::destroy($id);
        return redirect()->back();
    }
}
