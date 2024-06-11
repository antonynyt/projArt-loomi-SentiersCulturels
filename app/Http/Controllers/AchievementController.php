<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\PathHistory;
use App\Models\Poi;
use App\Models\Path;
use App\Models\Theme;

class AchievementController extends Controller
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

    private function retrieveUserBadges(){
        $user = Auth::user();
        $userBadges = $user->achievements;

        return $userBadges;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $allThemes = Theme::all();

        $allThemes->each(function ($theme){
            $userId = Auth::id();
            $theme->allPaths = $theme->paths;
            $theme->finishedPaths = count($theme->paths->filter(function ($path) use ($userId) {
                return $path->pathHistories->where('user_id', $userId)->isNotEmpty();
            }));
        });

        //dd($allThemes);

        $finishedPaths= $this->retrieveUserPaths();
        $badges = $this->retrieveUserBadges();
        $pathCount = count(Path::all());


        

        // Return the dashboard view with the data
        return Inertia::render('Profile/Achievements', [
            'finishedPaths' => $finishedPaths,
            'badges' => $badges,
            'pathCount'=>$pathCount,
            'themes'=>$allThemes,
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
