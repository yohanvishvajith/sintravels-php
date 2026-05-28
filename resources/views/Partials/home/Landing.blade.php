<div class="landing-img-wrapper">
        <img src="https://images.pexels.com/photos/3184360/pexels-photo-3184360.jpeg"  loading="lazy" alt="Landing Image">
        <div class="overlay-content">
            <h1>{!! __('home.title') !!}</h1>
            <p> {{ __('home.description') }}
            </p>
            <div class="btn-group">
                <button class="btn-find-jobs">{{ __('home.browse_jobs') }}<i class="fas fa-arrow-right m-2"></i></button>
                <button class="btn-watch-story"><i class="fas fa-play-circle m-2"></i>{{ __('home.watch_story') }}</button>
            </div>
            <div class="stats">
                <div class="stat-item">
                    <h2 style="color: #60A5FA;">700+</h2>
                    <p>
                        {{ __('home.stats.placements') }}
                    </p>
                </div>
                <div class="stat-item">
                    <h2 style="color: #2DD4BF;">6+</h2>
                    <p>
                        {{ __('home.stats.countries') }}
                    </p>
                </div>
                <div class="stat-item">
                    <h2 style="color:#FB923C">9</h2>
                    <p>
                        {{ __('home.stats.experience') }}
                    </p>
                </div>
            </div>


        </div>
    </div>