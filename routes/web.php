<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index']); //lista di tutti gli articoli
Route::get('/create', [ArticleController::class, 'create']); //form
Route::post('/store', [ArticleController::class, 'store']); //salvataggio
Route::get('/edit/{article}', [ArticleController::class, 'edit']); //modifico
Route::put('/update/{article}', [ArticleController::class, 'update']); //aggiorno
