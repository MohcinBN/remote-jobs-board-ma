<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;


Route::prefix('job')->group(function () {
    Route::get('/create', [JobController::class, 'create'])->name('job.create');
    Route::post('/store', [JobController::class, 'store'])->name('job.store');
});

Route::get('/all-jobs', [JobController::class, 'latestAddedJobs'])->name('job.latest');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
