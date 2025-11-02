<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\IncomeTypeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UsageController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Blog\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/blog', function () {
//     // dd('ffd');
//     return view('blog.index');
// });

Route::resource('examples', ExampleController::class);
// Soft delete routes
Route::get('examples-trash', [ExampleController::class, 'trash'])->name('examples.trash');
Route::get('examples-restore/{id}', [ExampleController::class, 'restore'])->name('examples.restore');
Route::delete('examples-force-delete/{id}', [ExampleController::class, 'forceDelete'])->name('examples.forceDelete');

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
        Route::get('/type-and-month-wise-expence-report', [ReportController::class, 'typeAndMonthWiseReport'])->name('type-and-month-wise-expence-report');
    });
    Route::group(['prefix' => 'games', 'as' => 'games.'], function () {
        Route::get('/dino', [GameController::class, 'dino'])->name('dino');
    });
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/destroy/{uuid}', [CategoryController::class, 'destroy'])->name('destroy');
        Route::get('/toggle-status/{uuid}', [CategoryController::class, 'toggleStatus'])->name('toggle-status');
    });
    Route::group(['prefix' => 'sub-categories', 'as' => 'sub-categories.'], function () {
        Route::get('/', [SubCategoryController::class, 'index'])->name('index');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('create');
        Route::post('/store', [SubCategoryController::class, 'store'])->name('store');
        Route::get('/destroy/{uuid}', [SubCategoryController::class, 'destroy'])->name('destroy');
        Route::get('/toggle-status/{uuid}', [SubCategoryController::class, 'toggleStatus'])->name('toggle-status');
    });
    Route::group(['prefix' => 'tags', 'as' => 'tags.'], function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('/create', [TagController::class, 'create'])->name('create');
        Route::post('/store', [TagController::class, 'store'])->name('store');
        Route::get('/destroy/{id}', [TagController::class, 'destroy'])->name('destroy');
        Route::get('/toggle-status/{uuid}', [TagController::class, 'toggleStatus'])->name('toggle-status');
    });

});
Route::get('/', [BlogController::class, 'index'])->name('index');
Route::group(['prefix' => 'blogs', 'as' => 'blogs.'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/create', [BlogController::class, 'create'])->name('create');
    Route::get('/list', [BlogController::class, 'list'])->name('list');
    Route::post('/store', [BlogController::class, 'store'])->name('store');
    Route::get('/category/{uuid}', [BlogController::class, 'category'])->name('category');
    Route::get('/tags/{uuid}', [BlogController::class, 'tags'])->name('tags');
    Route::get('/blog-post/{slug}', [BlogController::class, 'blogPost'])->name('blogPost');
    Route::get('/toggle-status/{uuid}', [BlogController::class, 'toggleStatus'])->name('toggle-status');


    Route::get('/about-us', [ContactController::class, 'aboutUs'])->name('about-us');
    Route::get('/contuct-us', [ContactController::class, 'contuctUs'])->name('contuct-us');
    Route::post('/contuct-us-form-get', [ContactController::class, 'store'])->name('contuct-us-form-get');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    Route::get('/contacts/view/{id}', [ContactController::class, 'show'])->name('contacts.view');
});


require __DIR__.'/auth.php';
