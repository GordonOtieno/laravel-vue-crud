<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\V1\StatusController;


Route::group(['prefix'=>'v1'], function(){
    Route::apiResource('tasks',TaskController::class);
    //->middleware('auth:sanctum');
    Route::apiResource('status',StatusController::class);
    //->middleware('auth:sanctum');
    // ->only(['store','show', 'update', 'destroy']);
    Route::post('/auth/register',[AuthController::class, 'createUser']);
    Route::post('/auth/login',[AuthController::class, 'loginUser']);
});