<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\PathHistory;
use App\Models\Poi;
use App\Models\Path;
use App\Models\Achievement;


class DashboardController extends Controller
{
    private function retrieveUserPaths(){
        $user = Auth::user();
        // $finishedPaths = pathHistory::where('user_id', $user->id)->path()->get();
        $finishedPaths = Path::with('pathHistories')->whereIn('id', $user->pathHistories->pluck('path_id'))->get();

            $pois = Poi::all();
            $finishedPaths->each(function ($path) {
                $path->thumbnail = Poi::with('photos')->find($path->pois->first()->id)->photos->first()->link;
                $path->location = explode(',', Poi::all()->find($path->pois->first()->id)->adress_label)[1];
                $path->type = 'path';
            });

            //dd($finishedPaths);

            return $finishedPaths;
    }

    private function retrieveUserBadges(){
        //$user = Auth::user();
        //$userBadges = $user->achievements;

        $badges = Achievement::all();

        

        return $badges;
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('user')) {
            // Retrieve finished paths for the authenticated user
            $finishedPaths= $this->retrieveUserPaths();
            $badges = $this->retrieveUserBadges();
            $pathCount = count(Path::all());

            //dd($badges);

            // Return the dashboard view with the data
            return Inertia::render('Dashboard', [
                'finishedPaths' => $finishedPaths,
                'badges' => $badges,
                'pathCount'=>$pathCount
            ]);
        } elseif ($user->hasRole('editor')) {
            $createdPaths = $this->retrieveUserPaths();
            return Inertia::render('DashboardEditor', ['createdPaths' => $createdPaths]);
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
