<?php

namespace App\Http\Controllers;

use App\Models\Path;
use Inertia\Inertia;

class MapController extends Controller
{

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
                    ],
                ];
            }),
        ];

        return json_encode($geojson);
    }
    public function index()
    {

        $paths = Path::with('pois')->get();

        foreach ($paths as $path) {
            $firstPoi = $path->pois->first();
            $pathCoordinates[] = [
                $firstPoi->long,
                $firstPoi->lat,
            ];
        }
        //append $pathCoordinates to $paths
        $paths->each(function ($path, $key) use ($pathCoordinates) {
            $path->long = $pathCoordinates[$key][0];
            $path->lat = $pathCoordinates[$key][1];
            $path->type = 'path';
        });

        $PathPoints = $this->formatGeoJson($paths);
        // dd($PathPoints);

        return Inertia::render('Map', [
            'poi' => $PathPoints,
        ]);
    }

    public function show($id)
    {
        $infos = Path::find($id);
        $path = Path::with('pois')->find($id);
        $geojson = $path->geojson;

        $pois = $path->pois;

        //get original attribute from pivot table
        $pois->each(function ($poi) {
            $poi->pivot_position = $poi->pivot->position;
        });

        $POIgeojson = [
            'type' => 'FeatureCollection',
            'features' => $pois->map(function ($poi) {
                return [
                    'type' => 'Feature',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [$poi->long, $poi->lat],
                    ],
                    'properties' => [
                        'id' => $poi->id,
                        'position' => $poi->pivot_position,
                        'name' => $poi->title,
                        'description' => $poi->descr,
                    ],
                ];
            }),
        ];

        $POIgeojson = json_encode($POIgeojson);

        return Inertia::render('Map', [
            'pathInfos' => $infos,
            'path' => $geojson,
            'poi' => $POIgeojson,
            'showPath' => true,
        ]);
    }
}
