<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return Inertia::render('Explorer', [
        'pathPoints' => file_get_contents('storage/sentiers/sentiers.geojson'),
    ]);
})->name('explorer');

Route::get('/map', function () {
    return Inertia::render('Map', [
        'pathPoints' => file_get_contents('storage/sentiers/sentiers.geojson'),
    ]);
});

Route::get('/map/{id}', function () {
    $id = request()->route('id');
    return Inertia::render('Map', [
        'path' => file_get_contents("storage/sentiers/$id/path.geojson"),
        'poi' => file_get_contents("storage/sentiers/$id/poi.geojson"),
        'showPath' => true,
    ]);
});

Route::get('/favoris', function () {
    return Inertia::render("Favorites");
})->middleware(['auth'])->name('favorites');

require __DIR__.'/auth.php';
