<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\Poi;
use Carbon\CarbonInterval;
use Inertia\Inertia;

class MapController extends Controller
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

    public function index() {

        // Get POIs in a path
        $pois = Poi::all();

        $pois->each(function ($poi) {
            $poi->type = 'poi';
            $poi->thumbnail = Poi::with('photos')->find($poi->id)->photos->first()->link;
            $poi->location = trim(explode(',', $poi->adress_label)[1]);
        });

        $paths = Path::all();
        $paths->each(function ($path) {
            $path->type = 'path';
            $path->long = $path->pois->first()->long;
            $path->lat = $path->pois->first()->lat;
            $path->thumbnail = Poi::with('photos')->find($path->pois->first()->id)->photos->first()->link;
            $path->location = trim(explode(',', Poi::all()->find($path->pois->first()->id)->adress_label)[1]);
        });

        $features = $pois->merge($paths);
        $geojson = $this->formatGeoJson($features);

        return Inertia::render('Map', [
            'poi' => $geojson,
        ]);
    }

    public function show(int $id)
    {

        $feature = Path::with('pois')->find($id);
        $pathGeojson = $feature->geojson;
        $feature->thumbnail = Poi::with('photos')->find($feature->pois->first()->id)->photos->first()->link;
        $feature->location = Poi::all()->find($feature->pois->first()->id)->adress_label;
        $feature->type = 'path';
        $pois = $feature->pois;
        $pois->each(function ($poi) {
            $poi->pivot_position = $poi->pivot->position;
            $poi->type = 'poi';
        });
        $POIgeojson = $this->formatGeoJson($pois);

        $infos = [
            'id' => $feature->id,
            'thumbnail' => $feature->thumbnail,
            'title' => $feature->title,
            'description' => $feature->descr,
            'location' => trim(explode(',', $feature->location,)[1]),
            'distance' => !empty($feature->distance) ? ($feature->distance < 1000 ? $feature->distance . ' m' : round($feature->distance / 1000, 1) . ' km') : '',
            'duration' => !empty($feature->duration) ? $this->formatTime($feature->duration) : '',
            'ascent' => !empty($feature->ascent) ? ($feature->ascent < 1000 ? $feature->ascent . ' m' : round($feature->ascent / 1000, 1) . ' km') : '',
        ];

        return Inertia::render('Map', [
            'pathInfos' => $infos,
            'path' => $pathGeojson,
            'poi' => $POIgeojson,
            'showPath' => true,
        ]);
    }
}
