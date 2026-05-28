<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// Auth Routes
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

Route::get('/', function () {
    return view('Index');
});
Route::get('/services', function () {
    return view('Service');
});
Route::get('/about', function () {
    return view('About');
});
Route::get('/contact', function () {
    return view('Contact');
});
Route::view('/jobs', 'Jobs')->name('jobs');
    
Route::post('/jobs/{jobId}/increment-view', [JobController::class, 'incrementViewCount']);

Route::view('/jobs', 'jobs')->name('jobs');
    
Route::get('lang/{locale}', function ($locale) {

    if (in_array($locale, ['en', 'si', 'ta'])) {
        session(['locale' => $locale]);
    }

    return redirect()->back();
});
