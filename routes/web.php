<?php

use App\Http\Controllers\MapController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

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

Route::get('/map', [MapController::class, 'index'])->name('map.index');
Route::get('/map/{id}', [MapController::class, 'show'])->name('map.show');

Route::get('/favoris', function () {
    return Inertia::render("Favorites");
})->middleware(['role:user,editor'])->name('favorites');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    if(auth()->user()->hasRole('user')){
        return Inertia::render('Dashboard');
    } else {
        return Inertia::render('DashboardEditor');
    }
})->middleware(['role:user,editor'])->name('dashboard');

/**
 * The role middleware in this code is used to restrict access to routes based on the role of the authenticated user.
 * One or multiple roles can be passed to the role middleware.
 */
Route::group(['middleware'=>'role:user'],function(){

});

Route::group(['middleware'=>'role:editor'],function(){
    Route::get('/new-path', function () {
        return Inertia::render('NewPath');
    })->name('new-path');
});

Route::group(['middleware'=>'role:admin'],function(){

});
