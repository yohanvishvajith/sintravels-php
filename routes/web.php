<?php

use App\Http\Controllers\JobController;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// Auth Routes
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

Route::get('/', function () {
    // Get countries with active job counts
    $jobCountries = DB::table('job_listings')
        ->select('country', DB::raw('count(*) as job_count'))
        ->where('closing_date', '>', now())
        ->groupBy('country')
        ->pluck('job_count', 'country');

    $countries = Country::all()->map(function ($country) use ($jobCountries) {
        return [
            'name' => $country->name,
            'flagimg' => $country->flagimg,
            'job_count' => $jobCountries[$country->name] ?? 0,
        ];
    });

    return view('Index', compact('countries'));
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


Route::view('/testing', 'testing')->name('testing');