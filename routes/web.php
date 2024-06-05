<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\IncomeTypeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UsageController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', [ProfileController::class, 'profile'])->middleware(['auth', 'verified'])->name('profile');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profiles', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profiles', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profiles', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'expence', 'as' => 'expence.'], function () {
        Route::get('/', [UsageController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'income', 'as' => 'income.'], function () {
        Route::get('/', [IncomeController::class, 'index'])->name('index');
    });


    Route::group(['prefix' => 'types', 'as' => 'types.'], function () {
        Route::get('/', [TypeController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'income_types', 'as' => 'income_types.'], function () {
        Route::get('/', [IncomeTypeController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::get('/date-wise-daily-report', [ReportController::class, 'dateWiseDailyReport'])->name('date-wise-daily-report');
        Route::get('/month-wise-expence-report', [ReportController::class, 'monthWiseReport'])->name('month-wise-expence-report');
        Route::get('/type-wise-expence-report', [ReportController::class, 'typeWiseReport'])->name('type-wise-expence-report');
    });
    Route::group(['prefix' => 'games', 'as' => 'games.'], function () {
        Route::get('/dino', [GameController::class, 'dino'])->name('dino');
    });
});

require __DIR__.'/auth.php';
