@extends('Layouts.main')
@section('title', __('about.page_title'))
@push('styles')
@vite(['resources/css/about.css'])
@endpush
@section('content')

{{-- Breadcrumb --}}
<x-page-breadcrumb
    page="{{ __('about.breadcrumb.page') }}"
    title="{{ __('about.breadcrumb.title') }}"
    subtitle="{{ __('about.breadcrumb.subtitle') }}" />

{{-- Hero --}}
<section class="abt-hero">
    <div class="abt-container">
        <div class="abt-hero-grid">
            <div class="abt-hero-text">
                <h2>{{ __('about.hero.title') }}</h2>
                <p>{{ __('about.hero.description_one') }}</p>
                <p>{{ __('about.hero.description_two') }}</p>
                <div class="abt-hero-buttons">
                    <a href="/contact" class="abt-btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        {{ __('about.hero.buttons.contact') }}
                    </a>
                    <a href="/services" class="abt-btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            <rect width="20" height="14" x="2" y="6" rx="2"></rect>
                        </svg>
                        {{ __('about.hero.buttons.services') }}
                    </a>
                </div>
            </div>
            <div class="abt-stats-grid">
                <div class="abt-stat-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M8 2v4"></path>
                        <path d="M16 2v4"></path>
                        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                        <path d="M3 10h18"></path>
                    </svg>
                    <div class="abt-stat-number">{{ __('about.stats.0.number') }}</div>
                    <div class="abt-stat-label">{{ __('about.stats.0.label') }}</div>
                </div>
                <div class="abt-stat-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                        <path d="M2 12h20"></path>
                    </svg>
                    <div class="abt-stat-number">{{ __('about.stats.1.number') }}</div>
                    <div class="abt-stat-label">{{ __('about.stats.1.label') }}</div>
                </div>
                <div class="abt-stat-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <div class="abt-stat-number">{{ __('about.stats.2.number') }}</div>
                    <div class="abt-stat-label">{{ __('about.stats.2.label') }}</div>
                </div>
                <div class="abt-stat-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                        <polyline points="16 7 22 7 22 13"></polyline>
                    </svg>
                    <div class="abt-stat-number">{{ __('about.stats.3.number') }}</div>
                    <div class="abt-stat-label">{{ __('about.stats.3.label') }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Mission & Vision --}}
<section class="abt-mission-section">
    <div class="abt-container">
        <div class="abt-section-header">
            <h2>{{ __('about.mission_vision.title') }}</h2>
        </div>
        <div class="abt-mission-grid">
            <div class="abt-mission-card abt-mission-card--blue">
                <div class="abt-mission-card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-blue">
                        <circle cx="12" cy="12" r="10"></circle>
                        <circle cx="12" cy="12" r="6"></circle>
                        <circle cx="12" cy="12" r="2"></circle>
                    </svg>
                    <h3>{{ __('about.mission_vision.mission.title') }}</h3>
                </div>
                <p>{{ __('about.mission_vision.mission.description') }}</p>
            </div>
            <div class="abt-mission-card abt-mission-card--teal">
                <div class="abt-mission-card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-teal">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                        <path d="M2 12h20"></path>
                    </svg>
                    <h3>{{ __('about.mission_vision.vision.title') }}</h3>
                </div>
                <p>{{ __('about.mission_vision.vision.description') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- Core Values --}}
<section class="abt-values-section">
    <div class="abt-container">
        <div class="abt-section-header">
            <h2>{{ __('about.values.title') }}</h2>
        </div>
        <div class="abt-values-grid">
            @php
            $values = [
            ['icon' => 'award', 'title' => 'INTEGRITY AND TRANSPARENCY', 'desc' => 'Commitment to honesty, ethical behavior, and openness in all business practices, ensuring trust with foreign workers, employers, and partners.', 'color' => '#2563eb'],
            ['icon' => 'target', 'title' => 'ACCOUNTABILITY', 'desc' => 'Upholding responsibility for the safety, welfare, and rights of all individuals placed in overseas employment, ensuring strict adherence to local and international labor laws.', 'color' => '#0d9488'],
            ['icon' => 'trending-up', 'title' => 'EXCELLENCE IN SERVICE', 'desc' => 'Striving for excellence in providing efficient, effective, and responsive services to both job seekers and foreign employers, ensuring high standards in recruitment and placement processes.', 'color' => '#ea580c'],
            ['icon' => 'users', 'title' => 'FAIRNESS AND EQUALITY', 'desc' => 'Ensuring equal opportunity for all Sri Lankan workers regardless of their background and promoting non-discriminatory practices in foreign employment.', 'color' => '#7c3aed'],
            ['icon' => 'heart', 'title' => 'WORKER EMPOWERMENT AND WELFARE', 'desc' => 'Focusing on the welfare, safety, and development of migrant workers through training, education, and continuous support, ensuring they are well-prepared and protected while employed abroad.', 'color' => '#db2777'],
            ['icon' => 'globe', 'title' => 'PARTNERSHIP AND COLLABORATION', 'desc' => 'Building strong relationships with foreign employers, governments, and international agencies to promote safe and ethical employment opportunities for Sri Lankan workers.', 'color' => '#16a34a'],
            ['icon' => 'calendar', 'title' => 'INNOVATION AND CONTINUOUS IMPROVEMENT', 'desc' => 'Embracing innovation in recruitment processes, using technology to ensure the efficient matching of skills with employer needs, and continuously improving services for stakeholders.', 'color' => '#2563eb'],
            ['icon' => 'briefcase', 'title' => 'COMPLIANCE WITH INTERNATIONAL STANDARDS', 'desc' => 'Committing to adhere to international labor standards and best practices, ensuring the rights and dignity of migrant workers are protected across all destinations.', 'color' => '#0d9488'],
            ];
            $svgs = [
            'award' => '<path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
            <circle cx="12" cy="8" r="6"></circle>',
            'target' => '<circle cx="12" cy="12" r="10"></circle>
            <circle cx="12" cy="12" r="6"></circle>
            <circle cx="12" cy="12" r="2"></circle>',
            'trending-up' => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
            <polyline points="16 7 22 7 22 13"></polyline>',
            'users' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>',
            'heart' => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>',
            'globe' => '<circle cx="12" cy="12" r="10"></circle>
            <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
            <path d="M2 12h20"></path>',
            'calendar' => '<path d="M8 2v4"></path>
            <path d="M16 2v4"></path>
            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
            <path d="M3 10h18"></path>',
            'briefcase' => '<path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
            <rect width="20" height="14" x="2" y="6" rx="2"></rect>',
            ];
            @endphp
            @foreach($values as $value)
            <div class="abt-value-card">
                <div class="abt-value-icon abt-value-icon--{{ $value['icon'] }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $svgs[$value['icon']] !!}</svg>
                </div>
                <h3>{{ __('about.values.items.' . $loop->index . '.title') }}</h3>
                <p>{{ __('about.values.items.' . $loop->index . '.description') }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Journey / Timeline --}}
<section class="abt-journey-section">
    <div class="abt-container">
        <div class="abt-section-header">
            <h2>{{ __('about.journey.title') }}</h2>
            <p>{{ __('about.journey.subtitle') }}</p>
        </div>
        <div class="abt-timeline">
            <div class="abt-timeline-line"></div>

            <div class="abt-timeline-item abt-timeline-item--left">
                <div class="abt-timeline-card">
                    <span class="abt-timeline-year">{{ __('about.journey.items.0.year') }}</span>
                    <h3>{{ __('about.journey.items.0.title') }}</h3>
                    <p>{{ __('about.journey.items.0.description') }}</p>
                </div>
                <div class="abt-timeline-dot"></div>
            </div>

            <div class="abt-timeline-item abt-timeline-item--right">
                <div class="abt-timeline-dot"></div>
                <div class="abt-timeline-card">
                    <span class="abt-timeline-year">{{ __('about.journey.items.1.year') }}</span>
                    <h3>{{ __('about.journey.items.1.title') }}</h3>
                    <p>{{ __('about.journey.items.1.description') }}</p>
                </div>
            </div>

            <div class="abt-timeline-item abt-timeline-item--left">
                <div class="abt-timeline-card">
                    <span class="abt-timeline-year">{{ __('about.journey.items.2.year') }}</span>
                    <h3>{{ __('about.journey.items.2.title') }}</h3>
                    <p>{{ __('about.journey.items.2.description') }}</p>
                </div>
                <div class="abt-timeline-dot"></div>
            </div>
        </div>
    </div>
</section>

{{-- Team Slider --}}
<section class="abt-team-section">
    <div class="abt-container">
        <div class="abt-section-header">
            <h2>{{ __('about.team.title') }}</h2>
            <p>{{ __('about.team.subtitle') }}</p>
        </div>
        <div class="abt-team-slider-wrapper">
            <div class="abt-team-card" id="abt-team-card">
                <div class="abt-team-photo">
                    <img id="abt-team-img" src="/images/team/team1.jpg" alt="Team Member"loading="lazy">
                </div>
                <h3 id="abt-team-name"></h3>
                <p id="abt-team-role"></p>
                <div class="abt-team-controls">
                    <button class="abt-team-btn" id="abt-team-prev">{{ __('about.team.prev') }}</button>
                    <div class="abt-team-dots" id="abt-team-dots"></div>
                    <button class="abt-team-btn" id="abt-team-next">{{ __('about.team.next') }}</button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Founder's Message --}}
<section class="abt-founder-section">
    <div class="abt-container">
        <div class="abt-section-header">
            <h2>{{ __('about.founder.title') }}</h2>
        </div>
        <div class="abt-founder-content">
            @foreach(__('about.founder.paragraphs') as $paragraph)
            <p>{{ $paragraph }}</p>
            @endforeach
            <p class="abt-founder-thanks">{{ __('about.founder.thanks') }}</p>
            <p class="abt-founder-sig">{!! __('about.founder.signature') !!}</p>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="abt-cta">
    <div class="abt-container abt-text-center">
        <div class="abt-cta-inner">
            <h2>{{ __('about.cta.title') }}</h2>
            <p>{{ __('about.cta.description') }}</p>
            <div class="abt-cta-buttons">
                <a href="/services" class="abt-btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        <rect width="20" height="14" x="2" y="6" rx="2"></rect>
                    </svg>
                    {{ __('about.cta.buttons.services') }}
                </a>
                <a href="/contact" class="abt-btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    {{ __('about.cta.buttons.contact') }}
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const team = [{
                name: 'Mr.Sampath',
                role: 'Founder & Chairman',
                img: '/images/team/team1.jpg'
            },
            {
                name: 'Mr.Gayan',
                role: 'Director (licensye)',
                img: '/images/team/team2.jpg'
            },
            {
                name: 'Ms.Anjalee',
                role: 'Recruitment Officer',
                img: '/images/team/team3.jpg'
            },
            {
                name: 'Ms. rivisarani ',
                role: 'Content creator',
                img: '/images/team/team4.jpg'
            },
            {
                name: 'Ms. kmari',
                role: 'HR Manager',
                img: '/images/team/team9.jpg'
            },
            {
                name: 'Ms.Sugandhi',
                role: 'Operations Manager',
                img: '/images/team/team6.jpg'
            },
          
            {
                name: 'Team Member',
                role: 'Documentation',
                img: '/images/team/team8.jpg'
            },
        ];

        const img = document.getElementById('abt-team-img');
        const name = document.getElementById('abt-team-name');
        const role = document.getElementById('abt-team-role');
        const dotsContainer = document.getElementById('abt-team-dots');
        const prevBtn = document.getElementById('abt-team-prev');
        const nextBtn = document.getElementById('abt-team-next');
        let current = 0;

        // Create dots
        team.forEach((_, i) => {
            const dot = document.createElement('button');
            dot.classList.add('abt-team-dot');
            dot.addEventListener('click', () => goTo(i));
            dotsContainer.appendChild(dot);
        });

        function goTo(index) {
            current = index;
            img.src = team[index].img;
            img.alt = team[index].name;
            name.textContent = team[index].name;
            role.textContent = team[index].role;
            document.querySelectorAll('.abt-team-dot').forEach((d, i) => {
                d.classList.toggle('active', i === index);
            });
        }

        prevBtn.addEventListener('click', () => goTo(current === 0 ? team.length - 1 : current - 1));
        nextBtn.addEventListener('click', () => goTo(current === team.length - 1 ? 0 : current + 1));

        goTo(0);
    });
</script>

@endsection