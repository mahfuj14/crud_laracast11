<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//index
Route::get('/movies', [MovieController::class, 'index']);
//create
Route::get('/movies/create', [MovieController::class, 'create']);
//show
Route::get('/movies/{movie}', [MovieController::class, 'show']);
//store
Route::post('/movies', [MovieController::class, 'store']);

//edit
Route::get('/movies/{movie}/edit', [MovieController::class, 'edit']);
//update
Route::patch('/movies/{movie}', [MovieController::class, 'update']);

//destroy
Route::delete('/movies/{movie}', [MovieController::class, 'destroy']);


