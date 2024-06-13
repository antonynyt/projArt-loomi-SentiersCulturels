<?php

namespace App\Http\Controllers;

use App\Models\PoiFavorite;
use App\Models\PoiHistory;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Poi;
use Inertia\Inertia;
use App\Models\PoiFact;
use App\Models\PoiHistory;
use App\Models\Photo;
use App\Models\Link;
use App\Models\Audio;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;

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
        $quiz = Quiz::where('poi_id', $id)->with('questions')->first();
        $quiz = empty(!$quiz) ? $quiz->questions->load('answers')->first() : null;

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
            'quiz' => $quiz,
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
        $poi = Poi::find($id);
        if ($poi->paths->count() > 2) {
            PoiFact::where('poi_id', $id)->delete();
            PoiHistory::where('poi_id', $id)->delete();
            Photo::where('poi_id', $id)->delete();
            Link::where('poi_id', $id)->delete();
            Audio::where('poi_id', $id)->delete();
            PoiFavorite::where('poi_id', $id)->delete();
            $quizzes = Quiz::where('poi_id', $id)->get();
            foreach ($quizzes as $quiz) {
                $questions = Question::where('quiz_id', $quiz->id)->get();
                foreach ($questions as $question) {
                    Answer::where('question_id', $question->id)->delete();
                }
                Question::where('quiz_id', $quiz->id)->delete();
            }
            Quiz::where('poi_id', $id)->delete();
            $poi->paths()->detach();
            Poi::destroy($id);
        }
        return redirect()->back();
    }
}
