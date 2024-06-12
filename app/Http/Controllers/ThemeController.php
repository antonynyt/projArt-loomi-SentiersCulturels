<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\Path;
use App\Models\Poi;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class ThemeController extends Controller
{

    private function retrieveUserPaths(){
        $user = Auth::user();
        $finishedPaths = Path::with('pathHistories')->whereIn('id', $user->pathHistories->pluck('path_id'))->get();

            $pois = Poi::all();
            $finishedPaths->each(function ($path) {
                $path->thumbnail = Poi::with('photos')->find($path->pois->first()->id)->photos->first()->link;
                $path->location = explode(',', Poi::all()->find($path->pois->first()->id)->adress_label)[1];
            });
            return $finishedPaths;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all Themes
        $themes = Theme::get();

        // Return the response as JSON
        return response()->json($themes);
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
        $userId = Auth::id();
        

        $theme = Theme::with('paths')->find($id);
        $theme->finishedPaths = $theme->paths->filter(function ($path) use ($userId) {
            return $path->pathHistories->where('user_id', $userId)->isNotEmpty();
        });
        $theme->count = count($theme->paths->filter(function ($path) use ($userId) {
            return $path->pathHistories->where('user_id', $userId)->isNotEmpty();
        }));

        $theme->finishedPaths->each(function ($path) {
            $path->thumbnail = Poi::with('photos')->find($path->pois->first()->id)->photos->first()->link;
            $path->location = explode(',', Poi::all()->find($path->pois->first()->id)->adress_label)[1];
        });

        $pathCount = count($theme->paths);

        //dd($theme->finishedPaths);

        return Inertia::render('Profile/ThemeFinishedPaths', [
            'title' => $theme->title,
            'finishedPaths' => $theme->finishedPaths,
            'finishedCount' => $theme->count,
            'pathCount' => $pathCount,
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
