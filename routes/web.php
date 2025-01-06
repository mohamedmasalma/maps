<?php

use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\adminControllPannelContoller;
use App\Http\Controllers\admin\CommentController as AdminCommentController;
use App\Http\Controllers\admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\feedController;
use App\Http\Controllers\followController;
use App\Http\Controllers\ideaController;
use App\Http\Controllers\likesController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\welcomeController;
use App\Http\Middleware\is_user_admin;
use App\Http\Middleware\setLang;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

// check this https://laravel.com/docs/10.x/controllers#resource-controllers

Route::get('/lang/{lang}',function($lang){

    session()->put('local',$lang);

    return redirect()->route("ideas.main");

})->name('lang');


Route::get('/', [welcomeController::class, 'welcomFunction'])->name('ideas.main');
Route::get('/terms', [welcomeController::class, 'show_terms'])->name('terms.show');

//idea route

Route::get('show/{idea}', [ideaController::class, 'show'])->name('ideas.show');



Route::post('store', [ideaController::class, 'store'])->name('ideas.store');

Route::get('edit/{idea}', [ideaController::class, 'edit'])
    ->name('ideas.edit')
    ->middleware('auth');

Route::delete('destroy/{idea}', [ideaController::class, 'destroy'])
    ->name('ideas.destroy')
    ->middleware('auth');

Route::post('update/{idea}', [ideaController::class, 'update'])
    ->name('ideas.update')
    ->middleware('auth');

//Route::resource('ideas', ideaController::class)->except(["index","Create"])->middleware('auth');

//comment routes
Route::post('/store/{idea}/comment', [CommentController::class, 'store'])->name('ideas.comments.store');

//Auth routes
//require base_path('');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware("guest");

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register/store', [AuthController::class, 'store'])->name('register.store');

Route::get('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//user routes
//Route::get("/users/{user}",[UserController::class,"show"])->name("users.show");

//Route::get("/users/{user}/edit",[UserController::class,"edit"])->name("users.edit");

Route::resource('users', UserController::class);

Route::post("users/{user}/follow",[followController::class,"follow"])->middleware("auth")->name("users.follow");
Route::post("users/{user}/unfollow",[followController::class,"unfollow"])->middleware("auth")->name("users.unfollow");

Route::post("ideas/{idea}/like",[likesController::class,"like"])->middleware("auth")->name("ideas.like");
Route::post("ideas/{idea}/unlike",[likesController::class,"unlike"])->middleware("auth")->name("ideas.unlike");

///////

Route::get('/test', [TestController::class, 'show']);

Route::post('/test', [TestController::class, 'store'])->name('test.store');


Route::get("/feed",feedController::class)->middleware("auth")->name("feed");


Route::middleware(["auth","can:admin"])->prefix("/admin")->as("admin.")->group(function(){

    Route::get('/', [adminControllPannelContoller::class, 'index'])->name('main');
    Route::resource('/users',UsersController::class)->only("index","show");
    Route::resource('/ideas',AdminIdeaController::class)->only("index","show","edit");
    Route::resource('/comments',AdminCommentController::class)->only("index","destroy");
});

