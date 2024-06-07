<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Path;
use App\Models\PathFavorite;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Poi;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer les path_id en fonction de l'user_id connecté
        $pathsFav = $user->pathFavorites()->with('path')->get();
        $pathsFav->each(function ($pathFav) {
            $pathFav->thumbnail = Poi::with('photos')->find($pathFav->path->pois->first()->id)->photos->first()->link;
            $pathFav->location = Poi::with('photos')->find($pathFav->path->pois->first()->id)->adress_label;
        });

        return Inertia::render('Favorites', [
            'paths' => $pathsFav,
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
