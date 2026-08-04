@extends('Layouts.main')
@section('title', __('services.page_title'))

@section('content')

{{-- Breadcrumb --}}
<x-page-breadcrumb
    page="{{ __('services.breadcrumb.page') }}"
    title="{{ __('services.breadcrumb.title') }}"
    subtitle="{{ __('services.breadcrumb.subtitle') }}" />

{{-- Hero --}}
<section class="svc-hero">
    <div class="svc-container svc-text-center">
        <div class="svc-hero-inner">
            <h2>{{ __('services.hero.title') }}</h2>
            <p>{{ __('services.hero.description') }}</p>
            <a href="/contact" class="svc-btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                    </path>
                </svg>
                {{ __('services.hero.button') }}
            </a>
        </div>
    </div>
</section>

{{-- Services Grid --}}
<section class="svc-cards-section">
    <div class="svc-container">
        <div class="svc-section-header">
            <h2>{{ __('services.portfolio.title') }}</h2>
            <p>{{ __('services.portfolio.subtitle') }}</p>
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
                <h3>{{ __('services.cards.recruitment.title') }}</h3>
                <ul class="svc-list">
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.recruitment.items.0') }}</li>
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.recruitment.items.1') }}</li>
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.recruitment.items.2') }}</li>
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
                <h3>{{ __('services.cards.visa.title') }}</h3>
                <ul class="svc-list">
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.visa.items.0') }}</li>
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.visa.items.1') }}</li>
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.visa.items.2') }}</li>
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
                <h3>{{ __('services.cards.training.title') }}</h3>
                <ul class="svc-list">
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.training.items.0') }}</li>
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.training.items.1') }}</li>
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
                <h3>{{ __('services.cards.compliance.title') }}</h3>
                <ul class="svc-list">
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.compliance.items.0') }}</li>
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.compliance.items.1') }}</li>
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.compliance.items.2') }}</li>
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
                <h3>{{ __('services.cards.employer.title') }}</h3>
                <ul class="svc-list">
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.employer.items.0') }}</li>
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.employer.items.1') }}</li>
                    <li><i class="fas fa-check-circle"></i> {{ __('services.cards.employer.items.2') }}</li>
                </ul>
            </div>

        </div>
    </div>
</section>

{{-- Process Steps --}}
<section class="svc-process-section">
    <div class="svc-container">
        <div class="svc-section-header">
            <h2>{{ __('services.process.title') }}</h2>
            <p>{{ __('services.process.subtitle') }}</p>
        </div>
        <div class="svc-process-grid">

            <div class="svc-process-step">
                <div class="svc-step-number">
                    <span>01</span>
                    <div class="svc-step-line"></div>
                </div>
                <h3>{{ __('services.process.steps.0.title') }}</h3>
                <p>{{ __('services.process.steps.0.description') }}</p>
            </div>

            <div class="svc-process-step">
                <div class="svc-step-number">
                    <span>02</span>
                    <div class="svc-step-line"></div>
                </div>
                <h3>{{ __('services.process.steps.1.title') }}</h3>
                <p>{{ __('services.process.steps.1.description') }}</p>
            </div>

            <div class="svc-process-step">
                <div class="svc-step-number">
                    <span>03</span>
                    <div class="svc-step-line"></div>
                </div>
                <h3>{{ __('services.process.steps.2.title') }}</h3>
                <p>{{ __('services.process.steps.2.description') }}</p>
            </div>

            <div class="svc-process-step">
                <div class="svc-step-number">
                    <span>04</span>
                </div>
                <h3>{{ __('services.process.steps.3.title') }}</h3>
                <p>{{ __('services.process.steps.3.description') }}</p>
            </div>

        </div>
    </div>
</section>

{{-- CTA Bottom --}}
<section class="svc-cta">
    <div class="svc-container svc-text-center">
        <div class="svc-cta-inner">
            <h2>{{ __('services.cta.title') }}</h2>
            <p>{{ __('services.cta.description') }}</p>
            <div class="svc-cta-buttons">
                <a href="/contact" class="svc-btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>
                    {{ __('services.cta.primary_button') }}
                </a>
                <a href="/contact" class="svc-btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                    {{ __('services.cta.secondary_button') }}
                </a>
            </div>
        </div>
    </div>
</section>

@endsection