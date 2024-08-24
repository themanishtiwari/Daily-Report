<?php

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
    Route::get('/profile', [BasicController::class, 'viewProfile']);
    Route::post('/get-data', [DashboardController::class, 'getData']);
});



Route::get('/test', [TestController::class, 'test']);