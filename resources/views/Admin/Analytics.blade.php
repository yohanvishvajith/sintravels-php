@extends('Layouts.Dashboard')
@section('title', 'Analytics')

@section('content')
<div class="dashboard-header">
    <h1>Analytics & Reports</h1>
    <p>View detailed analytics and generate reports</p>
</div>

<div class="analytics-filters">
    <select class="filter-select">
        <option>Last 7 days</option>
        <option>Last 30 days</option>
        <option>Last 3 months</option>
        <option>Last year</option>
    </select>
    <button class="btn btn-primary">Generate Report</button>
</div>

<div class="analytics-overview">
    <div class="analytics-card">
        <div class="analytics-icon">
            <i class="fas fa-eye"></i>
        </div>
        <div class="analytics-content">
            <h3>Page Views</h3>
            <p class="analytics-number">125,432</p>
            <span class="analytics-change positive">+12.5%</span>
        </div>
    </div>

    <div class="analytics-card">
        <div class="analytics-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="analytics-content">
            <h3>Unique Visitors</h3>
            <p class="analytics-number">8,942</p>
            <span class="analytics-change positive">+8.2%</span>
        </div>
    </div>

    <div class="analytics-card">
        <div class="analytics-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div class="analytics-content">
            <h3>Avg. Session Duration</h3>
            <p class="analytics-number">4:32</p>
            <span class="analytics-change negative">-2.1%</span>
        </div>
    </div>

    <div class="analytics-card">
        <div class="analytics-icon">
            <i class="fas fa-percentage"></i>
        </div>
        <div class="analytics-content">
            <h3>Bounce Rate</h3>
            <p class="analytics-number">42.3%</p>
            <span class="analytics-change positive">-5.7%</span>
        </div>
    </div>
</div>

<div class="analytics-charts">
    <div class="chart-section">
        <h3>Website Traffic</h3>
        <div class="chart-placeholder">
            <p>Traffic chart will be displayed here</p>
            <small>Integrate with your preferred chart library (Chart.js, etc.)</small>
        </div>
    </div>

    <div class="chart-section">
        <h3>Top Pages</h3>
        <div class="top-pages-list">
            <div class="page-item">
                <span class="page-url">/</span>
                <span class="page-views">25,432 views</span>
            </div>
            <div class="page-item">
                <span class="page-url">/jobs</span>
                <span class="page-views">18,521 views</span>
            </div>
            <div class="page-item">
                <span class="page-url">/about</span>
                <span class="page-views">12,341 views</span>
            </div>
            <div class="page-item">
                <span class="page-url">/contact</span>
                <span class="page-views">8,932 views</span>
            </div>
        </div>
    </div>
</div>
@endsection