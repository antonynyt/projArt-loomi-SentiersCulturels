<?php

use App\Http\Controllers\MapController;
use App\Http\Controllers\PathController;
use App\Http\Controllers\PoiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\EtapesController;

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
use App\Http\Controllers\NewPathController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return Inertia::render('Explorer');
})->name('explorer');

Route::get('/map', [MapController::class, 'index'])->name('map.index');
Route::get('/map/{id}', [MapController::class, 'show'])->name('map.show');

Route::get('/sentier/{id}', [PathController::class, 'show'])->name('path.show');
Route::get('/poi/{id}', [PoiController::class, 'show'])->name('poi.show');

Route::get('/favoris', [FavoriteController::class, 'index'])->middleware(['role:user,editor'])->name('favorites');

Route::get('/etapes/{id}', [EtapesController::class, 'show'])->name('etapes.show');

require __DIR__ . '/auth.php';

Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('user')) {
        return Inertia::render('Dashboard');
    } else {
        return Inertia::render('DashboardEditor');
    }
})->middleware(['role:user,editor'])->name('dashboard');

/**
 * The role middleware in this code is used to restrict access to routes based on the role of the authenticated user.
 * One or multiple roles can be passed to the role middleware.
 */
Route::group(['middleware' => 'role:user'], function () {

});

Route::group(['middleware' => 'role:editor'], function () {
    Route::get('/new-path', function () {
        return redirect('new-path/instructions'); });
    Route::get('/new-path/instructions', function () {
        return Inertia::render('NewPath/NewPathInstructions'); });
    Route::get('/new-path/map', function () {
        return redirect('new-path'); });
    Route::post('/new-path/map', [NewPathController::class, 'map'])->name('new-path.map');
    Route::get('/new-path/search', function () {
        return redirect('new-path'); });
    Route::post('/new-path/search', [NewPathController::class, 'search']);
    Route::get('/new-path/form', function () {
        return Inertia::render('NewPath/NewPathForm'); });
    Route::get('/new-path/success', function () {
        return Inertia::render('NewPath/NewPathSuccess'); });
});

Route::group(['middleware' => 'role:admin'], function () {

});
