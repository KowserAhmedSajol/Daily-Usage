<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TypeApiController;
use App\Http\Controllers\Api\IncomeTypeApiController;
use App\Http\Controllers\Api\UsageApiController;
use App\Http\Controllers\Api\IncomeApiController;
use App\Http\Controllers\Api\ReportApiController;
use App\Http\Controllers\Api\ProfileApiController;
use App\Http\Controllers\Api\BlogApiController;
use App\Http\Controllers\Api\CommentApiController;

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
    Route::post('/profile/change-cover', [ProfileApiController::class, 'changeCover']);
    Route::prefix('income_types')->group(function(){
        Route::post('/add', [IncomeTypeApiController::class, 'store']);
        Route::get('/all', [IncomeTypeApiController::class, 'index']);
    });
    Route::prefix('types')->group(function(){
        Route::post('/add', [TypeApiController::class, 'store']);
        Route::get('/all', [TypeApiController::class, 'index']);
    });
    
    Route::prefix('usage')->group(function(){
        Route::get('/all', [UsageApiController::class, 'index']);
        Route::post('/store', [UsageApiController::class, 'store']);
        Route::get('/update/{id}', [UsageApiController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [UsageApiController::class, 'delete'])->name('delete');
    });
    Route::prefix('income')->group(function(){
        Route::get('/all', [IncomeApiController::class, 'index']);
        Route::post('/store', [IncomeApiController::class, 'store']);
    });
    Route::prefix('report')->group(function(){
        Route::post('/date-wise-daily-report', [ReportApiController::class, 'dateWiseDailyReport']);
        Route::post('/month-wise-expence-report', [ReportApiController::class, 'monthWiseReport']);
        Route::post('/type-wise-expence-report', [ReportApiController::class, 'typeWiseReport']);
        Route::post('/type-and-month-wise-expence-report', [ReportApiController::class, 'typeAndMonthWiseReport']);
    });
    Route::prefix('blogs')->group(function(){
        Route::post('/get-sub-category', [BlogApiController::class, 'getSubCategory']);
    });
});
Route::prefix('blogs')->group(function(){
    Route::get('/load-blogs', [BlogApiController::class, 'loadBlogs']);
    Route::get('/load-blogs-categorized', [BlogApiController::class, 'loadBlogsCategorized']);
    Route::get('/load-blogs-tagged', [BlogApiController::class, 'loadBlogsTagged']);
    Route::get('/add-comment', [CommentApiController::class, 'addComment']);
});