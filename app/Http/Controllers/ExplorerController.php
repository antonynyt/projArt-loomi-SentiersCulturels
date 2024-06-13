<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\Theme;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use App\Models\PathHistory;
use Inertia\Inertia;
use App\Models\Poi;

class ExplorerController extends Controller
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
    private function popular() {
        $popular = PathHistory::popular();
        $popular->each(function ($pop) {
            $pop->thumbnail = Poi::with('photos')->find($pop->pois->first()->id)->photos->first()->link;
            $pop->location = Poi::with('photos')->find($pop->pois->first()->id)->adress_label;
            $pop->type = 'path';
        });
        return $popular;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paths = Path::all();
        $themes = Theme::has('paths')->with('paths')->get();
        
        //push all path->geojson to a collection
        $paths->each(function ($path) {
            $path->type = 'path';
            $path->long = $path->pois->first()->long;
            $path->lat = $path->pois->first()->lat;
            $path->thumbnail = Poi::with('photos')->find($path->pois->first()->id)->photos->first()->link;
            $path->location = trim(preg_replace('/\d/', '', explode(',', Poi::all()->find($path->pois->first()->id)->adress_label)[1]));
        });

        $pathPois = $this->formatGeoJson($paths);

        //get 2 random fun facts from pois->pois_facts(table)
        $facts = Poi::with('poiFacts', 'photos')->get()->random(2);
        $facts->each(function ($fact) {
            $fact->thumbnail = $fact->photos->first()->link;
            $fact->factTitle = $fact->poiFacts->first()->title;
            $fact->factContent = $fact->poiFacts->first()->content;
        });
        
        return Inertia::render('Explorer', [
            'populaires' => $this->popular(),
            'paths' => $paths,
            'themes' => $themes,
            'poi' => $pathPois,
            'facts' => $facts,
        ]);
    }
}
