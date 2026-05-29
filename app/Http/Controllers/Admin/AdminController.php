<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Job;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======
use App\Models\JobView;
use Illuminate\Support\Facades\DB;
>>>>>>> 9e4a6fe (modified)

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
        
        // Get views from this month
        $jobViewsThisMonth = JobView::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        // Get views from today
        $jobViewsToday = JobView::whereDate('created_at', now())
            ->count();

        // Get day-by-day views for each job over the last 30 days
        $viewsData = DB::table('job_views')
            ->select(
                'job_listings.id',
                'job_listings.title',
                DB::raw('DATE(job_views.created_at) as date'),
                DB::raw('count(job_views.id) as views')
            )
            ->join('job_listings', 'job_views.job_id', '=', 'job_listings.id')
            ->whereDate('job_views.created_at', '>=', now()->subDays(30))
            ->groupBy('job_listings.id', 'job_listings.title', DB::raw('DATE(job_views.created_at)'))
            ->orderBy('job_listings.title')
            ->orderBy('date')
            ->get();

        // Get all unique dates in range
        $allDates = DB::table('job_views')
            ->select(DB::raw('DATE(created_at) as date'))
            ->whereDate('created_at', '>=', now()->subDays(30))
            ->distinct()
            ->orderBy('date')
            ->pluck('date')
            ->map(fn($date) => \Carbon\Carbon::parse($date)->format('M d'))
            ->values();

        // Group data by job
        $jobViewsChart = [];
        $colors = [
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(199, 199, 199, 1)',
            'rgba(83, 102, 255, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 235, 162, 1)',
            'rgba(75, 192, 75, 1)',
        ];
        $bgColors = [
            'rgba(75, 192, 192, 0.1)',
            'rgba(54, 162, 235, 0.1)',
            'rgba(255, 206, 86, 0.1)',
            'rgba(153, 102, 255, 0.1)',
            'rgba(255, 159, 64, 0.1)',
            'rgba(199, 199, 199, 0.1)',
            'rgba(83, 102, 255, 0.1)',
            'rgba(255, 99, 132, 0.1)',
            'rgba(54, 235, 162, 0.1)',
            'rgba(75, 192, 75, 0.1)',
        ];

        $jobs = $viewsData->groupBy('id');
        $colorIndex = 0;

        foreach ($jobs as $jobId => $jobViews) {
            $jobTitle = $jobViews->first()->title;
            $dataPoints = [];

            foreach ($allDates as $dateLabel) {
                $date = \Carbon\Carbon::createFromFormat('M d', $dateLabel, config('app.timezone'))->toDateString();
                $view = $jobViews->firstWhere('date', $date);
                $dataPoints[] = $view ? $view->views : 0;
            }

            $jobViewsChart[] = [
                'label' => $jobTitle,
                'data' => $dataPoints,
                'borderColor' => $colors[$colorIndex % count($colors)],
                'backgroundColor' => $bgColors[$colorIndex % count($bgColors)],
            ];
            $colorIndex++;
        }

        return view('Admin.Dashboard', [
            'totalCountries' => $totalCountries,
            'jobsThisMonth' => $jobsThisMonth,
            'totalIndustries' => $totalIndustries,
            'jobViewsThisMonth' => $jobViewsThisMonth ?? 0,
            'jobViewsToday' => $jobViewsToday ?? 0,
<<<<<<< HEAD
            'jobViews' => $jobViews,
=======
            'jobViewsChart' => $jobViewsChart,
            'jobViewsChartDates' => $allDates,
>>>>>>> 9e4a6fe (modified)
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
