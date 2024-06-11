<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\PoiController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ThemeController;
use App\Http\Requests\PathRequest;
use App\Models\Path;
use App\Models\Link;

class NewPathController extends Controller
{
    public function search(Request $request)
    {
        $poiController = new PoiController();
        $pois = $poiController->index();
        $poiSelected = $request->input('poiSelected');

        return Inertia::render('NewPath/NewPathSearch', [
            'pois' => $pois->getData(),
            'poiSelected' => $poiSelected,
        ]);
    }

    public function map(Request $request)
    {
        $selectedPois = json_decode($request->input('selectedPois'));
        $path = null;
        if ($selectedPois && is_array($selectedPois) && count($selectedPois) >= 2) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://api.openrouteservice.org/v2/directions/foot-walking/geojson");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);

            // Désactiver la vérification SSL
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

            $coordinates = [];
            foreach ($selectedPois as $poi) {
                $coordinates[] = [
                    $poi->long,
                    $poi->lat,
                ];
            }
            $payload = [
                "coordinates" => $coordinates,
                "elevation" => "true",
                "language" => "fr"
            ];

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Accept: application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8",
                "Authorization: " . env("OPENROUTESERVICE_API_KEY"),
                "Content-Type: application/json; charset=utf-8"
            ));

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                // Si une erreur cURL survient, affichez le message d'erreur
                $error_msg = curl_error($ch);
                dd("cURL Error: " . $error_msg);
            }

            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);

            // Affichez le code de réponse HTTP pour diagnostiquer les erreurs
            if ($http_code != 200) {
                dd("HTTP Code: " . $http_code, $response);
            }

            $path = json_decode($response);
        }
        return Inertia::render('NewPath/NewPathMap', [
            'selectedPois' => $selectedPois,
            'path' => $path,
        ]);
    }

    public function form(Request $request)
    {
        $selectedPois = json_decode($request->input('selectedPois'));
        $path = json_decode($request->input('path'));

        $themeController = new ThemeController();
        $themes = $themeController->index();

        return Inertia::render('NewPath/NewPathForm', [
            'selectedPois' => $selectedPois,
            'path' => $path,
            'themes' => $themes->getData(),
        ]);
    }

    public function create(PathRequest $request)
    {
        $path = new Path();
        $path->title = $request->input('title');
        $path->descr = $request->input('description');
        $path->duration = $request->input('duration');
        $path->distance = $request->input('distance');
        $path->ascent = $request->input('ascent');
        $path->descent = $request->input('descent');
        $path->difficulty = "Difficile";
        $path->is_handicap_accessible = $request->input('isHandicapAccessible');
        $path->is_loop = $request->input('isLoop');
        $path->geojson = $request->input('path');
        $path->theme_id = $request->input('themeId');
        $path->save();

        $pois = $request->input('pois');
        for($i = 0; $i < count($pois); $i++) {
            $path->pois()->attach($pois[$i]['id'], ['position' => $i]);
        }

        $links = [];
        for ($i = 1; $i <= 3; $i++) {
            $name = $request->input('parkingName_' . $i);
            $url = $request->input('parkingUrl_' . $i);
            if ($name && $url) {
                Link::create([
                    'title' => $name,
                    'url' => $url,
                    'type' => 'parking',
                    'path_id' => $path->id,
                ]);
            }
        }

        return Inertia::render('NewPath/NewPathSuccess');
    }
}
