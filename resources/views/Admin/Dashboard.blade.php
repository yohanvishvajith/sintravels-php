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
    window.jobViewsChart = @json($jobViewsChart);
    window.jobViewsChartDates = @json($jobViewsChartDates);

    document.addEventListener('DOMContentLoaded', function() {
        if (!window.jobViewsChart || window.jobViewsChart.length === 0) {
            console.log('No job views data available');
            return;
        }

        const ctx = document.getElementById('jobViewsChart');
        if (!ctx) return;

        // Build datasets for each job
        const datasets = window.jobViewsChart.map(job => ({
            label: job.label,
            data: job.data,
            borderColor: job.borderColor,
            backgroundColor: job.backgroundColor,
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointRadius: 4,
            pointBackgroundColor: job.borderColor,
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointHoverRadius: 6,
        }));

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: window.jobViewsChartDates,
                datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 15,
                            font: {
                                size: 12,
                            }
                        }
                    },
                    title: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                        },
                        grid: {
                            display: true,
                            drawBorder: true,
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 11,
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
            }
        });
    });
</script>
@endpush

@endsection