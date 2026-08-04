<section class="job-locations">
    <div class="locations-container">
        @forelse ($countries as $country)
            <div class="location-card">
                <div class="location-header">
                    <img src="{{ asset($country['flagimg']) }}" loading="lazy" alt="{{ $country['name'] }} Flag" class="flag-icon">
                    <span class="job-count">{{ $country['job_count'] }} {{ $country['job_count'] === 1 ? __('home.job_locations.job') : __('home.job_locations.jobs') }}</span>
                </div>
                <div class="location-body">
                    <h3>{{ $country['name'] }}</h3>
                    <p>{{ __('home.job_locations.active_opportunities') }}</p>
                </div>
            </div>
        @empty
            <div class="location-card">
                <div class="location-body">
                    <p>{{ __('home.job_locations.empty_state') }}</p>
                </div>
            </div>
        @endforelse
    </div>
</section>