<?php

namespace App\Http\Controllers;

use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\PathHistory;
use App\Models\Poi;
use App\Models\Path;

class DashboardController extends Controller
{
    private function formatTime($seconds)
    {
        $interval = CarbonInterval::seconds($seconds)->cascade();
        if ($interval->h == 0) {
            return $interval->format('%imin');
        }
        return $interval->format('%hh%I');
    }
    private function retrieveUserPaths(){
        $user = Auth::user();
        // $finishedPaths = pathHistory::where('user_id', $user->id)->path()->get();
        $finishedPaths = Path::with('pathHistories')->whereIn('id', $user->pathHistories->pluck('path_id'))->get();

            $pois = Poi::all();
            $finishedPaths->each(function ($path) {
                $path->thumbnail = Poi::with('photos')->find($path->pois->first()->id)->photos->first()->link;
                $path->location = trim(preg_replace('/\d/', '', explode(',', Poi::all()->find($path->pois->first()->id)->adress_label)[1]));
                $path->distance = !empty($path->distance) ? ($path->distance < 1000 ? $path->distance . ' m' : round($path->distance / 1000, 1) . ' km') : '';
                $path->duration = !empty($path->duration) ? $this->formatTime($path->duration) : '';
                $path->ascent = !empty($path->ascent) ? ($path->ascent < 1000 ? $path->ascent . ' m' : round($path->ascent / 1000, 1) . ' km') : '';
            });

            //dd($finishedPaths);

            return $finishedPaths;
    }

    private function retrieveUserBadges(){
        $user = Auth::user();
        $userBadges = $user->achievements;

        return $userBadges;
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
