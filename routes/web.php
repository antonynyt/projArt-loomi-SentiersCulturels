<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

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
        'pathPoints' => asset('storage/sentiers/sentiers.geojson'),
    ]);
})->name('explorer');

Route::get('/sentiers', function () {
    return Inertia::render('Sentiers', [
        'pathPoints' => asset('storage/sentiers/sentiers.geojson'),
    ]);
});

Route::get('/sentiers/{id}', function () {
    return Inertia::render('Sentiers', [
        'path' => asset('storage/sentiers/{$id}/path.geojson'),
        'poi' => asset('storage/sentiers/{$id}/poi.geojson'),
    ]);
});

Route::get('/favoris', function () {
    return Inertia::render("Favorites");
})->middleware(['auth'])->name('favorites');

require __DIR__.'/auth.php';
