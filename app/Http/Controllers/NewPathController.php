<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\PoiController;

class NewPathController extends Controller
{
    public function search()
    {
        $poiController = new PoiController();
        $pois = $poiController->index();

        return Inertia::render('NewPath/NewPathSearch', [
            'pois' => $pois->getData(),
        ]);
    }
}
