<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\Poi;
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
        $path = Path::with('pois')->find($id);
        
        $path->thumbnail = Poi::with('photos')->find($path->pois->first()->id)->photos->first()->link;
        $path->location = Poi::all()->find($path->pois->first()->id)->adress_label;
        $pois = $path->pois;
        $pois->each(function ($poi) {
            $poi->pivot_position = $poi->pivot->position;
        });

        $infos = [
            'thumbnail' => $path->thumbnail,
            'title' => $path->title,
            'description' => $path->descr,
            'location' => explode(',', $path->location,)[1],
            'distance' => $path->distance / 1000,
            'duration' => $path->duration,
            'elevation' => $path->ascent / 1000,
        ];

        // dd($infos, $pathGeojson, $pois);

        return Inertia::render('Details', [
            'pathInfos' => $infos]);
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
        //
    }
}
