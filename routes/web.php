<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;



Route::group(['namespaces'=>'App\Http\Controllers'], function() {

        Route::group(['middleware'=>['guest']], function() {

            Route::get('/', [HomeController::class, 'index']);
            Route::post('/', [LoginController::class, 'login']);
            Route::get('/register', [RegisterController::class, 'show']);
            Route::post('/register', [RegisterController::class, 'register']);
            Route::get('/welcome', [HomeController::class, 'index']);
        });

        Route::group(['middleware'=>['auth']], function() {
            Route::get('/home', [HomeController::class, 'home']);
            Route::get('/search', [HomeController::class, 'search']);
            Route::get('/logout', [LogoutController::class, 'logout']);
            Route::post('/home', [ContactController::class, 'create']);
            Route::get('/contacts/{id}', [ContactController::class, 'show']);
            Route::put('/contacts/{id}', [ContactController::class, 'edit']);
            Route::delete('/contacts/{id}', [ContactController::class, 'delete']);
        });     
});


