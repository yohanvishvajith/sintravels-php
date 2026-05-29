    <section class="interactive-map">
        <div class="map-container">
            <h2 class="map-title">We're Global</h2>
            <p class="map-subtitle">Our network spans across the globe, connecting talent with opportunities in numerous countries. Hover over the highlighted countries to learn more.</p>
            <div id="world-map"></div>
            <div id="map-tooltip"></div>
        </div>
    </section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countriesData = @json($countries ?? []);
        
        // Create a map of country names to job counts
        const countryJobMap = {};
        countriesData.forEach(country => {
            countryJobMap[country.name] = country.job_count;
        });

        // Initialize the vector map
        const map = new jsVectorMap({
            selector: '#world-map',
            map: 'world',
            showTooltip: true,
            onRegionTipShow(e, el, code) {
                const countryName = el.innerHTML;
                const jobCount = countryJobMap[countryName] || 0;
                el.innerHTML = `${countryName}<br/>Jobs: ${jobCount}`;
            },
            regionStyle: {
                initial: {
                    fill: '#e5e7eb',
                    stroke: '#ffffff',
                    strokeWidth: 0.5,
                },
                hover: {
                    fill: '#2563eb',
                    stroke: '#ffffff',
                    strokeWidth: 0.5,
                    cursor: 'pointer',
                },
            },
        });

        // Highlight regions with active jobs
        const highlightedCountries = {};
        countriesData.forEach(country => {
            if (country.job_count > 0) {
                // Map country names to country codes if needed
                highlightedCountries[country.name] = { fill: '#10b981' };
            }
        });

        if (Object.keys(highlightedCountries).length > 0) {
            map.setRegionStyle(highlightedCountries);
        }
    });
</script>
@endpush