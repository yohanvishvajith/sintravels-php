<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

// Admin Dashboard Routes - Protected by auth and admin middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard/jobs', [AdminController::class, 'jobs'])->name('admin.jobs');
    Route::get('/dashboard/expired-jobs', [AdminController::class, 'expiredJobs'])->name('admin.expired-jobs');
    Route::get('/dashboard/settings', [AdminController::class, 'settings'])->name('admin.settings');
});
