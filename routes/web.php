<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ideaController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\welcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[welcomeController::class,"welcomFunction"])->name('ideas.main');

//idea route
Route::post('/store',[ideaController::class,"store"])->name('ideas.store');

Route::get('/show/{idea}',[ideaController::class,"show"])->name('ideas.show');

Route::get('/edit/{idea}',[ideaController::class,"edit"])->name('ideas.edit');

Route::delete('/destroy/{idea}',[ideaController::class,"destroy"])->name('ideas.destroy');

Route::post('/update/{idea}',[ideaController::class,"update"])->name('ideas.update');

//comment routes
Route::post('/store/{idea}/comment',[CommentController::class,"store"])->name("ideas.comment.store");













