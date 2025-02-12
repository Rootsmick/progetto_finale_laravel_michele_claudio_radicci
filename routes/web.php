<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
Route::get('/homepage', [MovieController::class, 'homepage']); //modifica profilo
Route::get('/', [MovieController::class, 'home']); //modifica profilo
Route::middleware(['auth'])->group(function () {
    Route::get('/edit-profile', function () {
        return view('edit-profile');
    })->middleware('verified');
    Route::get('/index/{name?}', [MovieController::class, 'index']); //lista di tutti i film
    Route::get('/create', [MovieController::class, 'create']); //form
    Route::post('/store', [MovieController::class, 'store']); //salvataggio
    Route::get('/edit/{movie}', [MovieController::class, 'edit']); //modifico

    Route::put('/update/{movie}', [MovieController::class, 'update']); //aggiorno
});
Route::middleware(['auth', 'password.confirm'])->group(function () {
    Route::delete('/delete/{movie}', [MovieController::class, 'deleteMovie'])
        ->name('delete.movie')
        ->middleware('verified');
});
Route::get('/show/{movie}', [MovieController::class, 'show']); //mostro film
