@extends('Layouts.main')
@section('title', 'About Us - SiN Travels')
@push('styles')
@vite(['resources/css/about.css'])
@endpush
@section('content')

{{-- Breadcrumb --}}
<x-page-breadcrumb
    page="About Us"
    title="About Us"
    subtitle="Your trusted partner in international recruitment and career development" />

{{-- Hero --}}
<section class="abt-hero">
    <div class="abt-container">
        <div class="abt-hero-grid">
            <div class="abt-hero-text">
                <h2>Connecting Talent with Global Opportunities</h2>
                <p>Our journey is marked by a relentless pursuit of global outreach. With strategic office in Kochchikade, Negambo, we have established a strong international presence. Expanding our horizons further, we are on the verge of opening new offices in Dubai, Oman, reinforcing our commitment to connecting talent with opportunities on a global scale.</p>
                <p>Our founder, P. C. Gayan Fernando, is an innovative and forward-thinking businessman, constantly exploring new avenues to elevate our industry. His vision goes beyond business success; it encompasses the prosperity of young lives in Sri Lanka. We aim to achieve this by providing them with not just jobs but meaningful careers that contribute to personal and professional growth.</p>
                <div class="abt-hero-buttons">
                    <a href="/contact" class="abt-btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        Get In Touch
                    </a>
                    <a href="/services" class="abt-btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            <rect width="20" height="14" x="2" y="6" rx="2"></rect>
                        </svg>
                        Our Services
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
                    <div class="abt-stat-number">5+</div>
                    <div class="abt-stat-label">Years of Experience</div>
                </div>
                <div class="abt-stat-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                        <path d="M2 12h20"></path>
                    </svg>
                    <div class="abt-stat-number">6+</div>
                    <div class="abt-stat-label">Partner Countries</div>
                </div>
                <div class="abt-stat-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <div class="abt-stat-number">700+</div>
                    <div class="abt-stat-label">Successful Placements</div>
                </div>
                <div class="abt-stat-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                        <polyline points="16 7 22 7 22 13"></polyline>
                    </svg>
                    <div class="abt-stat-number">98%</div>
                    <div class="abt-stat-label">Client Satisfaction</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Mission & Vision --}}
<section class="abt-mission-section">
    <div class="abt-container">
        <div class="abt-section-header">
            <h2>Our Mission, Vision &amp; Values</h2>
        </div>
        <div class="abt-mission-grid">
            <div class="abt-mission-card abt-mission-card--blue">
                <div class="abt-mission-card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-blue">
                        <circle cx="12" cy="12" r="10"></circle>
                        <circle cx="12" cy="12" r="6"></circle>
                        <circle cx="12" cy="12" r="2"></circle>
                    </svg>
                    <h3>Our Mission</h3>
                </div>
                <p>To bridge the gap between talent and opportunity by providing world-class recruitment services that transform careers and businesses globally. We are committed to excellence, integrity, and creating lasting value for all stakeholders in the recruitment ecosystem.</p>
            </div>
            <div class="abt-mission-card abt-mission-card--teal">
                <div class="abt-mission-card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-teal">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                        <path d="M2 12h20"></path>
                    </svg>
                    <h3>Our Vision</h3>
                </div>
                <p>To be the leading international manpower solution provider, recognized for our excellence, innovation, and commitment to client success. We envision a world where geographical boundaries don't limit career aspirations and business growth.</p>
            </div>
        </div>
    </div>
</section>

{{-- Core Values --}}
<section class="abt-values-section">
    <div class="abt-container">
        <div class="abt-section-header">
            <h2>Our Core Values</h2>
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
                <h3>{{ $value['title'] }}</h3>
                <p>{{ $value['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Journey / Timeline --}}
<section class="abt-journey-section">
    <div class="abt-container">
        <div class="abt-section-header">
            <h2>Our Journey</h2>
            <p>Key milestones in our growth and evolution</p>
        </div>
        <div class="abt-timeline">
            <div class="abt-timeline-line"></div>

            <div class="abt-timeline-item abt-timeline-item--left">
                <div class="abt-timeline-card">
                    <span class="abt-timeline-year">2021</span>
                    <h3>Launched Air Ticketing &amp; Tourist Visa Services</h3>
                    <p>We launched air ticketing and tourist visa services and expanded partnerships across countries.</p>
                </div>
                <div class="abt-timeline-dot"></div>
            </div>

            <div class="abt-timeline-item abt-timeline-item--right">
                <div class="abt-timeline-dot"></div>
                <div class="abt-timeline-card">
                    <span class="abt-timeline-year">2023</span>
                    <h3>Registered with the Sri Lanka Bureau of Foreign Employment</h3>
                    <p>The company was officially registered with the Sri Lanka Bureau of Foreign Employment (SLBFE).</p>
                </div>
            </div>

            <div class="abt-timeline-item abt-timeline-item--left">
                <div class="abt-timeline-card">
                    <span class="abt-timeline-year">2023</span>
                    <h3>Changed to Sin Travels and Manpower</h3>
                    <p>The business rebranded as Sin Travels and Manpower to reflect its expanded services and strategic direction under the new director.</p>
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
            <h2>Our Team</h2>
            <p>Meet the people behind SIN Travels &amp; Manpower</p>
        </div>
        <div class="abt-team-slider-wrapper">
            <div class="abt-team-card" id="abt-team-card">
                <div class="abt-team-photo">
                    <img id="abt-team-img" src="/images/team/team1.jpg" alt="Team Member"loading="lazy">
                </div>
                <h3 id="abt-team-name"></h3>
                <p id="abt-team-role"></p>
                <div class="abt-team-controls">
                    <button class="abt-team-btn" id="abt-team-prev">Prev</button>
                    <div class="abt-team-dots" id="abt-team-dots"></div>
                    <button class="abt-team-btn" id="abt-team-next">Next</button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Founder's Message --}}
<section class="abt-founder-section">
    <div class="abt-container">
        <div class="abt-section-header">
            <h2>FOUNDER'S MESSAGE</h2>
        </div>
        <div class="abt-founder-content">
            <p>As the founder of the SIN Travels &amp; Manpower Agency, I take immense pride in the role our agency has playing in shaping the future of Sri Lankan's overseas employment. From our inception, our primary goal has been to safeguard the rights and welfare of our workforce while creating opportunities for growth and development across the global job market.</p>
            <p>We recognize the immense contributions made by Sri Lankan workers abroad, not only in supporting their families but also in strengthening our national economy through remittances. Our mission, therefore, has always been to ensure that these individuals are well-prepared, well-protected, and equipped with the skills needed to thrive in foreign employment.</p>
            <p>Over the years, we have established rigorous standards and built strong relationships with international recruitment agencies, ensuring fair and ethical treatment for our workforce. Our commitment extends beyond just providing job opportunities, we focus on comprehensive support, from pre-departure training to welfare services while working abroad and reintegration programs for those returning home.</p>
            <p>As we look towards the future, we are committed to innovation and improvement. We will continue to strengthen our systems, introduce technology-driven solutions, and expand our global network to create more secure and diverse opportunities for Sri Lankans across the world. Together with our partners, stakeholders, and most importantly, the workers themselves, we remain dedicated to fostering a brighter, more prosperous future.</p>
            <p class="abt-founder-thanks">Thank you for your trust and support in our shared vision.</p>
            <p class="abt-founder-sig">P. C. GAYAN FERNANDO<br>Founder &amp; Chairman<br>SIN Travels &amp; Manpower Agency</p>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="abt-cta">
    <div class="abt-container abt-text-center">
        <div class="abt-cta-inner">
            <h2>Ready to Start Your Journey?</h2>
            <p>Join thousands of professionals who have trusted us with their career aspirations.</p>
            <div class="abt-cta-buttons">
                <a href="/services" class="abt-btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        <rect width="20" height="14" x="2" y="6" rx="2"></rect>
                    </svg>
                    Browse Services
                </a>
                <a href="/contact" class="abt-btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    Get In Touch
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const team = [{
                name: 'P. C. Gayan Fernando',
                role: 'Founder & Chairman',
                img: '/images/team/team1.jpg'
            },
            {
                name: 'Team Member',
                role: 'Manager',
                img: '/images/team/team2.jpg'
            },
            {
                name: 'Team Member',
                role: 'Recruitment Officer',
                img: '/images/team/team3.jpg'
            },
            {
                name: 'Team Member',
                role: 'Visa Consultant',
                img: '/images/team/team4.jpg'
            },
            {
                name: 'Ms. Swetha Abesinghe',
                role: 'Marketing',
                img: '/images/team/team5.jpg'
            },
            {
                name: 'Team Member',
                role: 'Operations',
                img: '/images/team/team6.jpg'
            },
            {
                name: 'Team Member',
                role: 'Customer Support',
                img: '/images/team/team7.jpg'
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