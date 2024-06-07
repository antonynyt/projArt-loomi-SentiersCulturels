<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\Poi;
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
                        'thumbnail' => $feature->thumbnail,
                        'location' => $feature->location,
                        'infos' => [
                            'distance' => $feature->distance,
                            'duration' => $feature->duration,
                            'difficulty' => $feature->difficulty,
                            'elevation' => $feature->elevation,
                            'type' => $feature->type,
                        ]
                    ],
                ];
            }),
        ];

        return json_encode($geojson);
    }
    // public function index()
    // {

    //     $paths = Path::with('pois')->get();

    //     foreach ($paths as $path) {
    //         $firstPoi = $path->pois->first();
    //         $pathCoordinates[] = [
    //             $firstPoi->long,
    //             $firstPoi->lat,
    //         ];
    //     }
    //     //append $pathCoordinates to $paths
    //     $paths->each(function ($path, $key) use ($pathCoordinates) {
    //         $path->long = $pathCoordinates[$key][0];
    //         $path->lat = $pathCoordinates[$key][1];
    //         $path->type = 'path';
    //     });

    //     $PathPoints = $this->formatGeoJson($paths);
    //     // dd($PathPoints);

    //     return Inertia::render('Map', [
    //         'poi' => $PathPoints,
    //     ]);
    // }

    public function index()
    {
        //return all pois and append path with type poi or path

        //get pois with photos in the photos table one to many relationship
        $pois = Poi::all();

        $pois->each(function ($poi) {
            $poi->type = 'poi';
            $poi->thumbnail = Poi::with('photos')->find($poi->id)->photos->first()->link;
        });

        $paths = Path::all();
        $paths->each(function ($path) {
            $path->type = 'path';
            $path->long = $path->pois->first()->long;
            $path->lat = $path->pois->first()->lat;
            $path->thumbnail = Poi::with('photos')->find($path->pois->first()->id)->photos->first()->link;
            $path->location = explode(',', Poi::all()->find($path->pois->first()->id)->adress_label)[1];
        });

        $features = $pois->merge($paths);
        $geojson = $this->formatGeoJson($features);

        return Inertia::render('Map', [
            'poi' => $geojson,
        ]);
    }

    public function show(int $id)
    {
        $path = Path::with('pois')->find($id);
        $pathGeojson = $path->geojson;

        $path->thumbnail = Poi::with('photos')->find($path->pois->first()->id)->photos->first()->link;
        $path->location = Poi::all()->find($path->pois->first()->id)->adress_label;
        $pois = $path->pois;
        $pois->each(function ($poi) {
            $poi->pivot_position = $poi->pivot->position;
        });

        $infos = [
            'id' => $path->id,
            'thumbnail' => $path->thumbnail,
            'title' => $path->title,
            'description' => $path->descr,
            'location' => explode(',', $path->location, )[1],
            'distance' => $path->distance / 1000,
            'duration' => $path->duration,
            'elevation' => $path->ascent / 1000,
        ];

        // dd($infos, $pathGeojson, $pois);

        $POIgeojson = $this->formatGeoJson($pois);

        return Inertia::render('Map', [
            'pathInfos' => $infos,
            'path' => $pathGeojson,
            'poi' => $POIgeojson,
            'showPath' => true,
        ]);
    }
}
