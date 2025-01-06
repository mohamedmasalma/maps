<?php

use App\Http\Controllers\api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource("tweets",ApiController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
