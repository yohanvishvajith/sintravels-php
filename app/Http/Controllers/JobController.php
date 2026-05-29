<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobView;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $jobs = Job::query()
            ->with(['jobBenefits.benefit'])
            ->where('closing_date', '>', now())
            ->orderBy('created_at', 'desc')
            ->get();

        $jobsData = $jobs->keyBy('id')->map(fn($job) => [
            'id' => $job->id,
            'title' => $job->title,
            'country' => $job->country,
            'visa' => $job->visa_category ?: 'N/A',
            'contract' => $job->contract_period ?: 'N/A',
            'type' => $job->type,
            'company' => $job->company ?: 'Unknown Company',
            'age' => $job->age_min . '–' . $job->age_max . ' years',
            'gender' => $job->gender,
            'hours' => $job->work_time ?: 'N/A',
            'experience' => $job->experience ?: 'N/A',
            'industry' => $job->industry ?: 'N/A',
            'vacancies' => $job->vacancies,
            'closing_date' => $job->closing_date ? $job->closing_date->format('M d, Y') : 'N/A',
            'holiday' => $job->holidays ?: 'N/A',
            'salary' => $job->currency . ' ' . number_format($job->salary_min) . ' – ' . $job->currency . ' ' . number_format($job->salary_max),
            'benefits' => $job->jobBenefits->filter(fn($jb) => $jb->benefit)->map(fn($jb) => $jb->benefit->name)->values()->toArray(),
            'requirements' => $job->requirements ?? [],
            'description' => $job->description && $job->description !== 'N/A' ? $job->description : '',
        ])->values()->keyBy('id');

        $flagCodes = \App\Models\Country::pluck('flagimg', 'name')->toArray();

        return view('Jobs', ['jobs' => $jobs, 'jobsData' => $jobsData, 'flagCodes' => $flagCodes]);
    }

    public function incrementViewCount($jobId): \Illuminate\Http\JsonResponse
    {
        $job = Job::find($jobId);

        if (! $job) {
            return response()->json(['error' => 'Job not found'], 404);
        }

        // Log the view
        JobView::create([
            'job_id' => $jobId,
            'created_at' => now(),
        ]);

        // Get current view count
        $viewCount = $job->views()->count();

        return response()->json(['view_count' => $viewCount, 'success' => true], 200);
    }
}
