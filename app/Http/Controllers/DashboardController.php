<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\PathHistory;
use App\Models\Poi;
use App\Models\Path;

class DashboardController extends Controller
{
    private function retrieveUserPaths(){
        $user = Auth::user();
        $finishedPaths = $user->pathHistories()
                ->with('path')
                ->get();

            $pois = Poi::all();
            $finishedPaths->each(function ($pathHist) {
                $pathHist->thumbnail = Poi::with('photos')->find($pathHist->path->pois->first()->id)->photos->first()->link;
                $pathHist->location = explode(',', Poi::all()->find($pathHist->path->pois->first()->id)->adress_label)[1];
            });

            return $finishedPaths;
    }
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('user')) {
            // Retrieve finished paths for the authenticated user
            
            $finishedPaths= $this->retrieveUserPaths();

            // Return the dashboard view with the finished paths data
            return Inertia::render('Dashboard', [
                'finishedPaths' => $finishedPaths,
            ]);
        } elseif ($user->hasRole('editor')) {
            return Inertia::render('DashboardEditor');
        }

        // Optionally, handle other roles or default case
        return Inertia::render('Dashboard'); // Or another default view

    }
    public function finishedPaths() {
        $finishedPaths = $this->retrieveUserPaths();

        $pathCount = count(Path::all());
        
        return Inertia::render('Profile/FinishedPaths', ['finishedPaths'=>$finishedPaths, 'pathCount'=>$pathCount]);

    }
}
