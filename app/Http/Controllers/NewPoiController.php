<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\PoiController;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\PoiRequest;
use App\Models\Poi;
use App\Models\PoiFact;
use App\Models\Link;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Photo;
use App\Models\Audio;
use Illuminate\Support\Facades\Storage;

class NewPoiController extends Controller
{
    public function form()
    {
        $poiController = new PoiController();
        $pois = $poiController->index();

        return Inertia::render('NewPoi/NewPoiForm', [
            'pois' => $pois->getData(),
        ]);
    }

    public function create(PoiRequest $request)
    {
        $poi = new Poi();
        $poi->title = $request->input('title');
        $shortDescr = $request->input('description');
        if (strlen($shortDescr) > 77) {
            $shortDescr = substr($shortDescr, 0, 77).'...';
        }
        $poi->short_descr = $shortDescr;
        $poi->descr = $request->input('description');

        $poi->lat = $request->input('lat');
        $poi->long = $request->input('long');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.openrouteservice.org/geocode/reverse?api_key=".env("OPENROUTESERVICE_API_KEY")."&point.lon=".$request->input('long')."&point.lat=".$request->input('lat')."&layers=address");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        // Désactiver la vérification SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Accept: application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8"
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        if (!$response) {
            return Inertia::render('NewPoi/NewPoiError', [
                'error' => 'Erreur lors de la récupération de l\'adresse'
            ]);
        }
        $nearestAddress = json_decode($response)->features[0]->properties;
        $poi->adress_label = $nearestAddress->street . $nearestAddress->housenumber . ', ' . $nearestAddress->postalcode . ' ' . $nearestAddress->locality . ', ' . $nearestAddress->country;
        $poi->accessibility = $request->input('isHandicapAccessible');
        $poi->user_id = auth()->user()->id;
        $poi->save();

        if($request->input('funFact')){
            $funFact = new PoiFact();
            $funFact->poi_id = $poi->id;
            $funFact->title = 'Faits amusants pour les curieux·se·s';
            $funFact->content = $request->input('funFact');
            $funFact->save();
        }

        $links = [
            ['name' => $request->input('linkName_1'), 'url' => $request->input('linkUrl_1')],
            ['name' => $request->input('linkName_2'), 'url' => $request->input('linkUrl_2')],
            ['name' => $request->input('linkName_3'), 'url' => $request->input('linkUrl_3')],
            ['name' => $request->input('linkName_4'), 'url' => $request->input('linkUrl_4')],
            ['name' => $request->input('linkName_5'), 'url' => $request->input('linkUrl_5')],
        ];
        foreach ($links as $link) {
            if ($link['name'] && $link['url']) {
                $linkModel = new Link();
                $linkModel->poi_id = $poi->id;
                $linkModel->title = $link['name'];
                $linkModel->url = $link['url'];
                $linkModel->type = 'poi';
                $linkModel->save();
            }
        }

        $photo = new Photo();
        $photo->poi_id = $poi->id;
        $photo->title = $request->input('pictureTitle');
        $photo->descr = $request->input('pictureDescr');
        $photo->author = $request->input('pictureAuthor');
        $photo->year = $request->input('pictureYear');
        $timestamp = time();
        $formattedTitle = preg_replace('/[^a-zA-Z0-9]/', '_', $request->input('pictureTitle'));
        $link = $request->input('pictureFile')->store('public/images/pois');
        $link = str_replace('public/', 'storage/', $link);
        $photo->link = asset($link);
        $photo->save();

        if($request->input('audioFile')){
            $audio = new Audio();
            $audio->poi_id = $poi->id;
            $audio->title = $request->input('audioTitle');
            $audio->descr = $request->input('audioDescr');
            $audio->author = $request->input('audioAuthor');
            $audio->year = $request->input('audioYear');
            $formattedTitle = preg_replace('/[^a-zA-Z0-9]/', '_', $request->input('audioTitle'));
            $link = $request->input('audioFile')->store('public/audio/pois');
            $link = str_replace('public/', 'storage/', $link);
            $audio->link = asset($link);
            $audio->lang = 'fr';
            $audio->save();
        }

        if($request->input('question')){
            $quiz = new Quiz();
            $quiz->poi_id = $poi->id;
            $tempTitle = 'Quiz - '.$poi->title;
            if (strlen($tempTitle) > 255) {
                $tempTitle = substr($tempTitle, 0, 255);
            }
            $quiz->title = $tempTitle;
            $quiz->save();

            $question = new Question();
            $question->quiz_id = $quiz->id;
            $question->question = $request->input('question');
            $question->save();

            $answers = [
                ['content' => $request->input('answer_1'), 'is_correct' => $request->input('correctAnswer') === 1],
                ['content' => $request->input('answer_2'), 'is_correct' => $request->input('correctAnswer') === 2],
                ['content' => $request->input('answer_3'), 'is_correct' => $request->input('correctAnswer') === 3],
                ['content' => $request->input('answer_4'), 'is_correct' => $request->input('correctAnswer') === 4],
            ];
            foreach ($answers as $key => $answer) {
                if ($answer['content']) {
                    $answerModel = new Answer();
                    $answerModel->question_id = $question->id;
                    $answerModel->answer = $answer['content'];
                    $answerModel->is_correct = $answer['is_correct'];
                    $answerModel->save();
                }
            }
        }

        return Inertia::render('NewPoi/NewPoiSuccess', [
            'poiId' => $poi->id,
        ]);
    }
}

