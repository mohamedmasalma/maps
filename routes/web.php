<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ideaController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\welcomeController;
use Illuminate\Support\Facades\Route;





// check this https://laravel.com/docs/10.x/controllers#resource-controllers

Route::get('/',[welcomeController::class,"welcomFunction"])->name('ideas.main');

//idea route

Route::get('show/{idea}',[ideaController::class,"show"])->name('ideas.show');

Route::post('store',[ideaController::class,"store"])->name('ideas.store');

Route::get('edit/{idea}',[ideaController::class,"edit"])->name('ideas.edit')->middleware('auth');

Route::delete('destroy/{idea}',[ideaController::class,"destroy"])->name('ideas.destroy')->middleware('auth');

Route::post('update/{idea}',[ideaController::class,"update"])->name('ideas.update')->middleware('auth');

//Route::resource('ideas', ideaController::class)->except(["index","Create"])->middleware('auth');


//comment routes
Route::post('/store/{idea}/comment',[CommentController::class,"store"])->name("ideas.comment.store");

//Auth routes
//require base_path('');

Route::get("/login",[AuthController::class,"login"])->name("login");

Route::get("/register",[AuthController::class,"register"])->name("register");

Route::post("/register/store",[AuthController::class,"store"])->name("register.store");

Route::get("/authenticate",[AuthController::class,"authenticate"])->name("authenticate");

Route::get("/logout",[AuthController::class,"logout"])->name("logout");


Route::get("/users/{user}",[UserController::class,"show"])->name("users.show");

Route::get("/users/{user}/edit",[UserController::class,"edit"])->name("users.edit");
///////










