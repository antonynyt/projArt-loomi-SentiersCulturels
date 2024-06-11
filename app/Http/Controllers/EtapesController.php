<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Poi;
use App\Models\Path;
use Inertia\Inertia;

class EtapesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        $path = Path::with('pois')->findOrFail($id);

        $path->pois = $path->pois()->get();

        $path->pois->each(function ($poi) {
            $poi->thumbnail = Poi::with('photos')->find($poi->first()->id)->photos->first()->link;
            $poi->location = Poi::with('photos')->find($poi->first()->id)->adress_label;
        });

        return Inertia::render('Etapes', [
            'pois' => $path->pois,
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
        //
    }
}
