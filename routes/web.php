<?php

use App\Http\Controllers\ExplorerController;
use App\Http\Controllers\LancementController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PathController;
use App\Http\Controllers\PoiController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\EtapesController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\NewPathController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\NewPoiController;

//ACCUEIL & EXPLORER
Route::get('/', [ExplorerController::class, 'index'])->name('explorer.index');
Route::get('/lancement', [LancementController::class, 'index'])->name('lancement.index');

//CARTE
Route::get('/map', [MapController::class, 'index'])->name('map.index');
Route::get('/map/{id}', [MapController::class, 'show'])->name('map.show');

//DETAILS SENTIERS & POIS
Route::get('/sentier/{id}', [PathController::class, 'show'])->name('path.show');
Route::post('/sentier/{path}/like', [FavoriteController::class, 'togglePath']);
Route::post('/sentier/{path}/done', [HistoryController::class, 'togglePath']);
Route::get('/poi/{id}', [PoiController::class, 'show'])->name('poi.show');
Route::post('/poi/{poi}/like', [FavoriteController::class, 'togglePoi']);
Route::post('/poi/{poi}/done', [HistoryController::class, 'togglePoi']);
// Route::get('/etapes/{id}', [EtapesController::class, 'show'])->name('etapes.show');

//LISTE DE SENTIERS
Route::get('/sentiers', [PathController::class, 'all'])->name('path.index');
Route::get('/sentiers/{theme}', [PathController::class, 'index'])->name('path.index');
Route::get('/related/{id}', [PathController::class, 'related'])->name('path.related');

//FAVORIS
Route::get('/favoris', [FavoriteController::class, 'index'])->middleware(['role:user,editor'])->name('favorites');

require __DIR__ . '/auth.php';

//PROFIL
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['role:user,editor'])->name('dashboard');
Route::get('/dashboard/finished-paths', [DashboardController::class, 'finishedPaths'])->middleware(['role:user,editor'])->name('dashboard.finishedPaths');

Route::get('/dashboard/accomplissements', [AchievementController::class, 'index'])->middleware(['role:user,editor'])->name('achievement.index');
Route::get('/dashboard/accomplissements/{id}', [AchievementController::class, 'show'])->middleware(['role:user,editor']);

Route::get('/dashboard/accomplissements/theme/{id}', [ThemeController::class, 'show'])->middleware(['role:user,editor']);

/**
 * The role middleware in this code is used to restrict access to routes based on the role of the authenticated user.
 * One or multiple roles can be passed to the role middleware.
 */
Route::group(['middleware' => 'role:user'], function () {

});

Route::group(['middleware' => 'role:editor'], function () {
    Route::get('/new-path', function () {
        return redirect('new-path/instructions');
    });
    Route::get('/new-path/{otherThanExistant}', function () {
        return redirect('new-path/instructions');
    })->where('otherThanExistant', '^(?!instructions$|success$|form$).*');
    Route::get('/new-path/instructions', function () {
        return Inertia::render('NewPath/NewPathInstructions');
    });
    Route::post('/new-path/map', [NewPathController::class, 'map'])->name('new-path.map');
    Route::post('/new-path/search', [NewPathController::class, 'search']);
    Route::post('/new-path/form', [NewPathController::class, 'form']);
    Route::get('/new-path/success', function () {
        return Inertia::render('NewPath/NewPathSuccess'); });

    Route::delete('/sentier/{id}', [PathController::class, 'destroy'])->where('id', '[0-9]+');
    Route::delete('/poi/{id}', [PoiController::class, 'destroy'])->where('id', '[0-9]+');
    Route::get('/new-path/form', function () {
        return Inertia::render('NewPath/NewPathForm');
    });
    Route::post('/new-path/create', [NewPathController::class, 'create']);

    Route::get('/new-poi{otherThanExistant}', function () { return redirect('new-poi/form'); })->where('otherThanExistant', '^(?!/form$).*');
    Route::get('/new-poi/form', [NewPoiController::class, 'form']);
    Route::post('/new-poi/create', [NewPoiController::class, 'create']);
});

Route::group(['middleware' => 'role:admin'], function () {

});