<section class="job-locations">
    <div class="locations-container">
        @forelse ($countries as $country)
            <div class="location-card">
                <div class="location-header">
                    <img src="{{ asset($country['flagimg']) }}" loading="lazy" alt="{{ $country['name'] }} Flag" class="flag-icon">
                    <span class="job-count">{{ $country['job_count'] }} {{ $country['job_count'] === 1 ? 'job' : 'jobs' }}</span>
                </div>
                <div class="location-body">
                    <h3>{{ $country['name'] }}</h3>
                    <p>Active opportunities</p>
                </div>
            </div>
        @empty
            <div class="location-card">
                <div class="location-body">
                    <p>No active job locations at the moment.</p>
                </div>
            </div>
        @endforelse
    </div>
</section>