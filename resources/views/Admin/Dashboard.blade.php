@extends('Layouts.Dashboard')
@section('title', 'Dashboard')

@section('content')
<div class="dashboard-header">
    <h1>Dashboard Overview</h1>
    <p>Welcome to your admin dashboard</p>
</div>

<div class="dashboard-stats">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-globe"></i>
        </div>
        <div class="stat-content">
            <h3>Total Countries</h3>
            <p class="stat-number">{{ $totalCountries }}</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="stat-content">
            <h3>Jobs This Month</h3>
            <p class="stat-number">{{ $jobsThisMonth }}</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-industry"></i>
        </div>
        <div class="stat-content">
            <h3>Total Industries</h3>
            <p class="stat-number">{{ $totalIndustries }}</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-eye"></i>
        </div>
        <div class="stat-content">
            <h3>Job Views This Month</h3>
            <p class="stat-number">{{ $jobViewsThisMonth }}</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="stat-content">
            <h3>Job Views Today</h3>
            <p class="stat-number">{{ $jobViewsToday }}</p>
        </div>
    </div>
</div>

<div class="dashboard-charts">
    <div class="chart-container">
        <h3>Job Views</h3>
        <canvas id="jobViewsChart"></canvas>
    </div>
</div>

@push('scripts')
<script>
    window.jobViewsData = @json($jobViews);
</script>
@endpush

@endsection