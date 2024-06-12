<?php

namespace App\Http\Controllers;

use App\Models\PoiFavorite;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use App\Models\Path;
use App\Models\PathFavorite;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Poi;

class FavoriteController extends Controller
{
    private function formatTime($seconds)
    {
        $interval = CarbonInterval::seconds($seconds)->cascade();
        if ($interval->h == 0) {
            return $interval->format('%imin');
        }
        return $interval->format('%hh%I');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();
        $pathsFav = Path::with('pois')->whereIn('id', $user->pathFavorites->pluck('path_id'))->get();

        $pathsFav->each(function ($pathFav) {
            $pathFav->thumbnail = Poi::with('photos')->find($pathFav->pois->first()->id)->photos->first()->link;
            $pathFav->location = Poi::with('photos')->find($pathFav->pois->first()->id)->adress_label;
            $pathFav->type = 'path';
            $pathFav->location = trim(preg_replace('/\d/', '', explode(',', $pathFav->location)[1]));
            $pathFav->distance = !empty($pathFav->distance) ? ($pathFav->distance < 1000 ? $pathFav->distance . ' m' : round($pathFav->distance / 1000, 1) . ' km') : '';
            $pathFav->duration = !empty($pathFav->duration) ? $this->formatTime($pathFav->duration) : '';
            $pathFav->ascent = !empty($pathFav->ascent) ? ($pathFav->ascent < 1000 ? $pathFav->ascent . ' m' : round($pathFav->ascent / 1000, 1) . ' km') : '';
        });

        $poisFav = Poi::whereIn('id', $user->poiFavorites->pluck('poi_id'))->get();

        $poisFav->each(function ($poiFav) {
            $poiFav->thumbnail = Poi::with('photos')->find($poiFav->id)->photos->first()->link;
            $poiFav->location = $poiFav->adress_label;
            $poiFav->type = 'poi';
        });

        return Inertia::render('Favorites', [
            'paths' => $pathsFav,
            'pois' => $poisFav,
        ]);
    }

    public function togglePath(Path $path)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si l'utilisateur a déjà liké le path
        $pathFav = PathFavorite::where('user_id', $user->id)->where('path_id', $path->id)->first();

        // Si l'utilisateur a déjà liké le path, on le supprime
        if ($pathFav) {
            $pathFav->delete();
        } else {
            // Sinon, on le crée
            PathFavorite::create([
                'user_id' => $user->id,
                'path_id' => $path->id,
            ]);
        }

        return redirect()->back();
        
    }

    public function togglePoi(Poi $poi)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si l'utilisateur a déjà liké le path
        $poiFav = PoiFavorite::where('user_id', $user->id)->where('poi_id', $poi->id)->first();

        // Si l'utilisateur a déjà liké le path, on le supprime
        if ($poiFav) {
            $poiFav->delete();
        } else {
            // Sinon, on le crée
            PoiFavorite::create([
                'user_id' => $user->id,
                'poi_id' => $poi->id,
            ]);
        }

        return redirect()->back();
        
    }

}