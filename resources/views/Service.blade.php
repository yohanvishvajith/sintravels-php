@extends('Layouts.main')
@section('title', 'Our Services - SIN Travels')

@section('content')

{{-- Breadcrumb --}}
<x-page-breadcrumb
    page="Services"
    title="Our Services"
    subtitle="Comprehensive career and recruitment solutions tailored to your needs" />

{{-- Hero --}}
<section class="svc-hero">
    <div class="svc-container svc-text-center">
        <div class="svc-hero-inner">
            <h2>Empowering Careers, Enabling Success</h2>
            <p>From job placement to career development, we offer comprehensive solutions to help individuals and
                organizations achieve their goals.</p>
            <a href="/contact" class="svc-btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                    </path>
                </svg>
                Schedule Consultation
            </a>
        </div>
    </div>
</section>

{{-- Services Grid --}}
<section class="svc-cards-section">
    <div class="svc-container">
        <div class="svc-section-header">
            <h2>Comprehensive Service Portfolio</h2>
            <p>We provide end-to-end solutions for all your career and recruitment needs</p>
        </div>
        <div class="svc-grid">

            {{-- Card 1 --}}
            <div class="svc-card svc-card--blue">
                <div class="svc-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon-blue">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3>RECRUITMENT AND PLACEMENT</h3>
                <ul class="svc-list">
                    <li><i class="fas fa-check-circle"></i> Sourcing candidates for various industries.</li>
                    <li><i class="fas fa-check-circle"></i> Screening, interviewing, and shortlisting candidates.</li>
                    <li><i class="fas fa-check-circle"></i> Matching candidates with suitable job openings abroad.</li>
                </ul>
            </div>

            {{-- Card 2 --}}
            <div class="svc-card svc-card--teal">
                <div class="svc-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon-teal">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                        <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                        <path d="M10 9H8"></path>
                        <path d="M16 13H8"></path>
                        <path d="M16 17H8"></path>
                    </svg>
                </div>
                <h3>VISA PROCESSING ASSISTANCE</h3>
                <ul class="svc-list">
                    <li><i class="fas fa-check-circle"></i> Guiding candidates through the visa application process.</li>
                    <li><i class="fas fa-check-circle"></i> Assistance with documentation and embassy appointments.</li>
                    <li><i class="fas fa-check-circle"></i> Updates on visa status and timelines.</li>
                </ul>
            </div>

            {{-- Card 3 --}}
            <div class="svc-card svc-card--orange">
                <div class="svc-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon-orange">
                        <path
                            d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z">
                        </path>
                        <path d="M22 10v6"></path>
                        <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"></path>
                    </svg>
                </div>
                <h3>TRAINING AND SKILL DEVELOPMENT</h3>
                <ul class="svc-list">
                    <li><i class="fas fa-check-circle"></i> Pre-departure training (language, culture, and work ethics
                        specific to the destination country).</li>
                    <li><i class="fas fa-check-circle"></i> Professional certifications and vocational training to meet
                        foreign employer requirements.</li>
                </ul>
            </div>

            {{-- Card 4 --}}
            <div class="svc-card svc-card--purple">
                <div class="svc-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon-purple">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                        <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                        <path d="M10 9H8"></path>
                        <path d="M16 13H8"></path>
                        <path d="M16 17H8"></path>
                    </svg>
                </div>
                <h3>COMPLIANCE AND DOCUMENTATION</h3>
                <ul class="svc-list">
                    <li><i class="fas fa-check-circle"></i> Assistance with legal paperwork and contracts.</li>
                    <li><i class="fas fa-check-circle"></i> Ensuring compliance with both local and international labor
                        laws.</li>
                    <li><i class="fas fa-check-circle"></i> Verification of candidate qualifications and experience.</li>
                </ul>
            </div>

            {{-- Card 5 --}}
            <div class="svc-card svc-card--green">
                <div class="svc-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon-green">
                        <rect width="16" height="20" x="4" y="2" rx="2" ry="2"></rect>
                        <path d="M9 22v-4h6v4"></path>
                        <path d="M8 6h.01"></path>
                        <path d="M16 6h.01"></path>
                        <path d="M12 6h.01"></path>
                        <path d="M12 10h.01"></path>
                        <path d="M12 14h.01"></path>
                        <path d="M16 10h.01"></path>
                        <path d="M16 14h.01"></path>
                        <path d="M8 10h.01"></path>
                        <path d="M8 14h.01"></path>
                    </svg>
                </div>
                <h3>EMPLOYER SERVICES</h3>
                <ul class="svc-list">
                    <li><i class="fas fa-check-circle"></i> Partnering with foreign employers to fulfill staffing needs.
                    </li>
                    <li><i class="fas fa-check-circle"></i> Tailoring recruitment solutions based on specific job
                        requirements.</li>
                    <li><i class="fas fa-check-circle"></i> Ongoing support for employers, such as performance tracking
                        and workforce management.</li>
                </ul>
            </div>

        </div>
    </div>
</section>

{{-- Process Steps --}}
<section class="svc-process-section">
    <div class="svc-container">
        <div class="svc-section-header">
            <h2>Our Process</h2>
            <p>A systematic approach to delivering exceptional results</p>
        </div>
        <div class="svc-process-grid">

            <div class="svc-process-step">
                <div class="svc-step-number">
                    <span>01</span>
                    <div class="svc-step-line"></div>
                </div>
                <h3>Initial Consultation</h3>
                <p>We begin with a one-on-one consultation to understand your career goals, skills, and preferred
                    countries for employment.</p>
            </div>

            <div class="svc-process-step">
                <div class="svc-step-number">
                    <span>02</span>
                    <div class="svc-step-line"></div>
                </div>
                <h3>Career Strategy &amp; Job Matching</h3>
                <p>Our experts create a personalized job search strategy, matching your qualifications with the best
                    opportunities abroad.</p>
            </div>

            <div class="svc-process-step">
                <div class="svc-step-number">
                    <span>03</span>
                    <div class="svc-step-line"></div>
                </div>
                <h3>Application &amp; Visa Assistance</h3>
                <p>We guide you through every step of the application process, including CV preparation, interview
                    support, and visa documentation.</p>
            </div>

            <div class="svc-process-step">
                <div class="svc-step-number">
                    <span>04</span>
                </div>
                <h3>Placement &amp; Ongoing Support</h3>
                <p>Once placed, we continue to provide guidance and support to help you settle into your new role and
                    adapt to life overseas.</p>
            </div>

        </div>
    </div>
</section>

{{-- CTA Bottom --}}
<section class="svc-cta">
    <div class="svc-container svc-text-center">
        <div class="svc-cta-inner">
            <h2>Ready to Get Started?</h2>
            <p>Contact us today to discuss how our services can help you achieve your goals.</p>
            <div class="svc-cta-buttons">
                <a href="/contact" class="svc-btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>
                    Schedule Consultation
                </a>
                <a href="/contact" class="svc-btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>

@endsection