<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

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



// job management routes;
Route::prefix('job')->group(function () {
    Route::get('/all', [JobController::class, 'index'])->name('job.index');
    Route::get('/create', [JobController::class, 'create'])->name('job.create');
    Route::post('/store', [JobController::class, 'store'])->name('job.store');
    Route::get('/{id}/edit', [JobController::class, 'edit'])->name('job.edit');
    Route::put('/{id}/update', [JobController::class, 'update'])->name('job.update');
    Route::delete('/{id}/delete', [JobController::class, 'destroy'])->name('job.destroy');
});

// front-end routes 
Route::get('/', [JobController::class, 'latestAddedJobs']);
