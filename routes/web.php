<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\BasicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\DailyReportController;

#login by cookie

Route::get('/', [DailyReportController::class, 'index']);

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::resource('/dashboard', DashboardController::class);
    Route::get('/profile', [AuthController::class, 'viewProfile']);
    Route::post('/profile/update', [AuthController::class, 'updateProfile']);
    Route::put('/profile/passowrd/update', [AuthController::class, 'updatePassword']);
    Route::post('/get-data', [DashboardController::class, 'getData']);
});

Route::middleware('guest')->group(function(){
    Route::get('google/login', [AuthController::class, 'googleLogin']);
    Route::get('google/callback', [AuthController::class, 'googleCallback']);
});



Route::get('/test', [TestController::class, 'test']);