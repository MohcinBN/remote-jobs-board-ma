<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    // job management routes;
    Route::prefix('job')->group(function () {
        Route::get('/all', [JobController::class, 'index'])->name('job.index');
        Route::get('/create', [JobController::class, 'create'])->name('job.create');
        Route::post('/store', [JobController::class, 'store'])->name('job.store');
        Route::get('/{id}/edit', [JobController::class, 'edit'])->name('job.edit');
        Route::put('/{id}/update', [JobController::class, 'update'])->name('job.update');
        Route::delete('/{id}/delete', [JobController::class, 'destroy'])->name('job.destroy');
        // change status route
        Route::get('/chnage-status', [JobController::class, 'changeJobStatus'])->name('change-status');
    });
    // Page Management
    Route::prefix('page')->group(function () {
        Route::get('/all', [PageController::class, 'index'])->name('page.index');
        Route::get('/create', [PageController::class, 'create'])->name('page.create');
        Route::post('/store', [PageController::class, 'store'])->name('page.store');
    });
});


// front-end routes 
Route::get('/', [JobController::class, 'latestAddedJobs'])->name('welcome');
Route::get('/create', [JobController::class, 'create_job_from_visitors'])->name('visitor.create');
Route::post('/store', [JobController::class, 'store_from_ui'])->name('job.visitor.store');

// static pages
Route::get('/about-remoter', [PageController::class, 'about'])->name('page.about');
Route::get('/contact-us', [PageController::class, 'contact'])->name('page.contact');


// Subscribe Routes
Route::post('/store/subscription', [SubscriptionController::class, 'store'])->name('subscription.email.store');
Route::get('/subscribed', [SubscriptionController::class, 'done'])->name('subscription.done');
Route::get('/all/subscription', [SubscriptionController::class, 'index'])->name('subscription.all');
