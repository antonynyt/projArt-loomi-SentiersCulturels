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
use App\Http\Controllers\ExplorerController;

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
use App\Http\Controllers\NewPathController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AchievementController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Route::get('/', function () {
    return Inertia::render('Explorer');
})->name('explorer'); */

Route::get('/', [ExplorerController::class, 'index'])->name('explorer.index');

Route::get('/map', [MapController::class, 'index'])->name('map.index');
Route::get('/map/{id}', [MapController::class, 'show'])->name('map.show');

Route::get('/sentier/{id}', [PathController::class, 'show'])->name('path.show');
Route::post('/sentier/{path}/like', [FavoriteController::class, 'togglePath']);
Route::get('/poi/{id}', [PoiController::class, 'show'])->name('poi.show');
Route::post('/poi/{poi}/like', [FavoriteController::class, 'togglePoi']);

Route::get('/favoris', [FavoriteController::class, 'index'])->middleware(['role:user,editor'])->name('favorites');

Route::get('/etapes/{id}', [EtapesController::class, 'show'])->name('etapes.show');

require __DIR__ . '/auth.php';

//Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['role:user,editor'])->name('dashboard');
//CHANGED
Route::get('/dashboard/finished-paths', [DashboardController::class, 'finishedPaths'])->middleware(['role:user,editor'])->name('dashboard.finishedPaths');
Route::get('/dashboard/accomplissements', [AchievementController::class, 'index'])->middleware(['role:user,editor'])->name('achievement.index');

/**
 * The role middleware in this code is used to restrict access to routes based on the role of the authenticated user.
 * One or multiple roles can be passed to the role middleware.
 */
Route::group(['middleware' => 'role:user'], function () {

});

<<<<<<< HEAD
Route::group(['middleware' => 'role:editor'], function () {
    Route::get('/new-path', function () {
        return redirect('new-path/instructions');
    });
    Route::get('/new-path/{otherThanExistant}', function () {
        return redirect('new-path/instructions');
    })->where('otherThanExistant', '^(?!instructions$|success$).*');
    Route::get('/new-path/instructions', function () {
        return Inertia::render('NewPath/NewPathInstructions');
    });
    Route::post('/new-path/map', [NewPathController::class, 'map'])->name('new-path.map');
    Route::post('/new-path/search', [NewPathController::class, 'search']);
    Route::post('/new-path/form', [NewPathController::class, 'form']);
    Route::get('/new-path/success', function () {
        return Inertia::render('NewPath/NewPathSuccess');
    });
=======
Route::group(['middleware'=>'role:editor'],function(){
    Route::get('/new-path', function () { return redirect('new-path/instructions'); });
    Route::get('/new-path/{otherThanExistant}', function () { return redirect('new-path/instructions'); })->where('otherThanExistant', '^(?!instructions$|success$|form$).*');
    Route::get('/new-path/instructions', function () { return Inertia::render('NewPath/NewPathInstructions');});
    Route::post('/new-path/map', [NewPathController::class, 'map'])->name('new-path.map');
    Route::post('/new-path/search', [NewPathController::class, 'search']);
    Route::post('/new-path/form', [NewPathController::class, 'form']);
    Route::get('/new-path/form', function () { return Inertia::render('NewPath/NewPathForm'); });
    Route::post('/new-path/create', [NewPathController::class, 'create']);
>>>>>>> 6a82f5b2953b71bff680ff0a53cf21468020f6d9
});

Route::group(['middleware' => 'role:admin'], function () {

});
