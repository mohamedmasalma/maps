<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get("/login",[AuthController::class,"login"])->name("login");

Route::get("/register",[AuthController::class,"register"])->name("register");

Route::post("/register/store",[AuthController::class,"store"])->name("register.store");

Route::get("/authenticate",[AuthController::class,"authenticate"])->name("authenticate");

Route::get("/logout",[AuthController::class,"logout"])->name("logout");
