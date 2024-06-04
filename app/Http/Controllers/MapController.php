<?php

namespace App\Http\Controllers;

use App\Models\Path;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MapController extends Controller
{
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
            $path->coordinates = $pathCoordinates[$key];
        });

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => $paths->map(function ($path) {
                return [
                    'type' => 'Feature',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => $path->coordinates,
                    ],
                    'properties' => [
                        'id' => $path->id,
                        'name' => $path->title,
                        'description' => $path->descr,
                    ],
                ];
            }),
        ];

        $geojson = json_encode($geojson);

        return Inertia::render('Map', [
            'pathPoints' => $geojson,
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
