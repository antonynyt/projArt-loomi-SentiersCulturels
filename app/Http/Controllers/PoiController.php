<?php

namespace App\Http\Controllers;

use App\Models\PoiFavorite;
use App\Models\PoiHistory;
use Illuminate\Http\Request;
use App\Models\Poi;
use Inertia\Inertia;

class PoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all POIs with their associated photos
        $pois = Poi::with('photos')->get();

        // Return the response as JSON
        return response()->json($pois);
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

        $poi = Poi::with('photos', 'poiFacts', 'audio', 'link')->find($id);

        // dd($poi);

        $infos = [
            'id' => $poi->id,
            'photos' => $poi->photos,
            'title' => $poi->title,
            'description' => $poi->descr,
            'location' => trim(preg_replace('/\d/', '', explode(',', $poi->adress_label)[1])),
            'lat' => $poi->lat,
            'long' => $poi->long,
            'is_handicap_accessible' => $poi->is_handicap_accessible,
            'facts' => $poi->poiFacts->toArray(),
            'audios' => count($poi->audio) > 0 ? $poi->audio->toArray() : null,
            'links' => empty(!$poi->link) ? $poi->link->toArray() : null,
        ];

        // detect if liked
        $liked = false;
        if (auth()->check()) {
            $user = auth()->user();
            $liked = PoiFavorite::where('user_id', $user->id)->where('poi_id', $poi->id)->first() ? true : false;
        }

        // detect if done
        $done = false;
        if (auth()->check()) {
            $user = auth()->user();
            $done = PoiHistory::where('user_id', $user->id)->where('poi_id', $poi->id)->first() ? true : false;
        }

        return Inertia::render('Details', [
            'infos' => $infos,
            'type' => 'poi',
            'liked' => $liked,
            'done' => $done,
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
