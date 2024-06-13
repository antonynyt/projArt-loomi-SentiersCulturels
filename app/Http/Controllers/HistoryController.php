<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\PathHistory;
use App\Models\Poi;
use App\Models\PoiHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function togglePath(Path $path)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si l'utilisateur a déjà liké le path
        $pathFav = PathHistory::where('user_id', $user->id)->where('path_id', $path->id)->first();

        // Si l'utilisateur a déjà liké le path, on le supprime
        if ($pathFav) {
            $pathFav->delete();
        } else {
            // Sinon, on le crée
            PathHistory::create([
                'user_id' => $user->id,
                'path_id' => $path->id,
            ]);
            foreach ($path->pois as $poi) {
                PoiHistory::create([
                    'user_id' => $user->id,
                    'poi_id' => $poi->id,
                ]);
            }
        }

        return redirect()->back();
        
    }

    public function togglePoi(Poi $poi)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si l'utilisateur a déjà liké le path
        $poiDone = PoiHistory::where('user_id', $user->id)->where('poi_id', $poi->id)->first();

        // Si l'utilisateur a déjà liké le path, on le supprime
        if ($poiDone) {
            $poiDone->delete();
        } else {
            // Sinon, on le crée
            PoiHistory::create([
                'user_id' => $user->id,
                'poi_id' => $poi->id,
            ]);
        }

        return redirect()->back();
        
    }
}
