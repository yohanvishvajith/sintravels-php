<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function dashboard()
    {
        $totalCountries = Country::count();
        $jobsThisMonth = Job::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();
        $totalIndustries = Industry::count();
        $jobViewsThisMonth = Job::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->sum('view_count');
        $jobViewsToday = Job::whereDate('created_at', now())
            ->sum('view_count');

        // Get job views data for chart
        $jobViews = Job::select('title', 'country', 'view_count')
            ->where('view_count', '>', 0)
            ->orderByDesc('view_count')
            ->limit(10)
            ->get()
            ->map(fn($job) => [
                'label' => $job->title . ' (' . $job->country . ')',
                'views' => $job->view_count,
            ]);

        return view('Admin.Dashboard', [
            'totalCountries' => $totalCountries,
            'jobsThisMonth' => $jobsThisMonth,
            'totalIndustries' => $totalIndustries,
            'jobViewsThisMonth' => $jobViewsThisMonth ?? 0,
            'jobViewsToday' => $jobViewsToday ?? 0,
            'jobViews' => $jobViews,
        ]);
    }

    /**
     * Display the jobs management page.
     */
    public function jobs()
    {
        return view('Admin.Jobs');
    }

    /**
     * Display the expired jobs page.
     */
    public function expiredJobs()
    {
        return view('Admin.ExpiredJobs');
    }

    /**
     * Display the settings page.
     */
    public function settings()
    {
        return view('Admin.Settings');
    }
}
