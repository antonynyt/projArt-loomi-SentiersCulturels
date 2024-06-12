<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PathHistory;
use Inertia\Inertia;
use App\Models\Poi;

class ExplorerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popular = PathHistory::popular();
        /*         $popularPaths = PathHistory::getPopularPaths(); */
        /*         dd($popular); */
        $popular->each(function ($pop) {
            $pop->thumbnail = Poi::with('photos')->find($pop->pois->first()->id)->photos->first()->link;
            $pop->location = Poi::with('photos')->find($pop->pois->first()->id)->adress_label;
        });
        return Inertia::render('Explorer', [
            'populaires' => $popular,
        ]);
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
        //
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
