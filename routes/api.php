<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TypeApiController;
use App\Http\Controllers\Api\UsageApiController;
use App\Http\Controllers\Api\ReportApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['web', 'auth'])->group(function () {
// Route::middleware('auth')->group(function () {
    
    Route::prefix('types')->group(function(){
    // Route::group(['prefix' => 'types', 'as' => 'types.'], function () {
        Route::post('/add', [TypeApiController::class, 'store']);
        Route::get('/all', [TypeApiController::class, 'index']);
    });
    
    Route::prefix('usage')->group(function(){
        Route::get('/all', [UsageApiController::class, 'index']);
        Route::post('/store', [UsageApiController::class, 'store']);
    });
    Route::prefix('report')->group(function(){
        Route::post('/date-wise-daily-report', [ReportApiController::class, 'dateWiseDailyReport']);
    });
});
