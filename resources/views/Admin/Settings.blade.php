@extends('Layouts.Dashboard')
@section('title', 'Settings')

@section('content')
<div class="dashboard-header">
    <h1>Settings</h1>
    <p>Configure your application settings</p>
</div>

<div class="settings-container">
    <div class="settings-nav">
        <ul class="settings-tabs">
            <li class="tab-item active">
                <button class="tab-button" data-tab="general">Country</button>
            </li>
            <li class="tab-item">
                <button class="tab-button" data-tab="security">Benefits</button>
            </li>
            <li class="tab-item">
                <button class="tab-button" data-tab="notifications">Industries</button>
            </li>
            <li class="tab-item">
                <button class="tab-button" data-tab="currency">Currency</button>
            </li>
            <li class="tab-item">
                <button class="tab-button" data-tab="visa">Visa Categories</button>
            </li>
            <li class="tab-item">
                <button class="tab-button" data-tab="advanced">Users</button>
            </li>
        </ul>
    </div>

    <div class="settings-content">
        <div class="tab-content active" id="general">
            <!-- Countries Management Section -->
            <livewire:admin-country-manager />
        </div>

        <div class="tab-content" id="security">
            <!-- Benefits Management Section -->
            <livewire:admin-benefit-manager />
        </div>

        <div class="tab-content" id="notifications">
            <!-- Industries Management Section -->
            <livewire:admin-industry-manager />
        </div>

        <div class="tab-content" id="currency">
            <!-- Currency Management Section -->
            <livewire:admin-currency-manager />
        </div>

        <div class="tab-content" id="visa">
            <!-- Visa Categories Management Section -->
            <livewire:admin-visa-category-manager />
        </div>

        <div class="tab-content" id="advanced">
            <!-- Users Management Section -->
            <livewire:admin-user-manager />
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Settings tabs functionality
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');

            // Remove active class from all tabs and content
            document.querySelectorAll('.tab-item').forEach(item => item.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

            // Add active class to clicked tab and corresponding content
            this.parentElement.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        });
    });
</script>
@endpush
@endsection