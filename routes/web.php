<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
Route::get('/', [ArticleController::class, 'home']); //modifica profilo
Route::middleware(['auth', 'password.confirm'])->group(function () {
    Route::get('/edit-profile', function () {
        return view('edit-profile');
    })->middleware('verified');
    Route::get('/index', [ArticleController::class, 'index']); //lista di tutti gli articoli
    Route::get('/create', [ArticleController::class, 'create']); //form
    Route::post('/store', [ArticleController::class, 'store']); //salvataggio
    Route::get('/edit/{article}', [ArticleController::class, 'edit']); //modifico
    Route::get('/show/{article}', [ArticleController::class, 'show']); //modifico
    Route::put('/update/{article}', [ArticleController::class, 'update']); //aggiorno
    Route::delete('/delete/{id}', [ArticleController::class, 'deleteArticle'])->name('delete.article');
});
//Route::get('/index', [ArticleController::class, 'index']); //lista di tutti gli articoli
//Route::get('/edit-profile', [ArticleController::class, 'editProfile']); //modifica profilo
