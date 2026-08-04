@extends('Layouts.main')

@push('styles')
@vite(['resources/css/contact.css'])
@endpush
@section('title', __('contact.page_title'))
@section('content')

{{-- Breadcrumb --}}
<x-page-breadcrumb
    page="{{ __('contact.breadcrumb.page') }}"
    title="{{ __('contact.breadcrumb.title') }}"
    subtitle="{{ __('contact.breadcrumb.subtitle') }}" />

{{-- Hero Banner --}}
<section class="cnt-hero">
    <div class="cnt-hero-inner">
        <div class="cnt-hero-content">
            <h2>{{ __('contact.hero.title') }}</h2>
            <p>{{ __('contact.hero.description') }}</p>
            <div class="cnt-hero-badges">
                <div class="cnt-hero-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                    </svg>
                    <span>{{ __('contact.hero.badges.quick_response') }}</span>
                </div>
                <div class="cnt-hero-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                        <path d="M2 12h20" />
                    </svg>
                    <span>{{ __('contact.hero.badges.global_expertise') }}</span>
                </div>
                <div class="cnt-hero-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21.801 10A10 10 0 1 1 17 3.335" />
                        <path d="m9 11 3 3L22 4" />
                    </svg>
                    <span>{{ __('contact.hero.badges.proven_results') }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Contact Info Cards --}}
<section class="cnt-info-section">
    <div class="cnt-container">
        <div class="cnt-info-grid">
            {{-- Phone --}}
            <div class="cnt-info-card">
                <div class="cnt-info-icon cnt-icon-blue">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                    </svg>
                </div>
                <h3>{{ __('contact.info_cards.phone.title') }}</h3>
                <p class="cnt-info-sub">{{ __('contact.info_cards.phone.subtitle') }}</p>
                <p class="cnt-info-val">{{ __('contact.info_cards.phone.values.0') }}</p>
                <p class="cnt-info-val">{{ __('contact.info_cards.phone.values.1') }}</p>
            </div>
            {{-- Email --}}
            <div class="cnt-info-card">
                <div class="cnt-info-icon cnt-icon-green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="16" x="2" y="4" rx="2" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg>
                </div>
                <h3>{{ __('contact.info_cards.email.title') }}</h3>
                <p class="cnt-info-sub">{{ __('contact.info_cards.email.subtitle') }}</p>
                <p class="cnt-info-val">{{ __('contact.info_cards.email.values.0') }}</p>
            </div>
            {{-- Address --}}
            <div class="cnt-info-card">
                <div class="cnt-info-icon cnt-icon-orange">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                        <circle cx="12" cy="10" r="3" />
                    </svg>
                </div>
                <h3>{{ __('contact.info_cards.address.title') }}</h3>
                <p class="cnt-info-sub">{{ __('contact.info_cards.address.subtitle') }}</p>
                <p class="cnt-info-val">{{ __('contact.info_cards.address.values.0') }}</p>
                <p class="cnt-info-val">{{ __('contact.info_cards.address.values.1') }}</p>
            </div>
            {{-- Business Hours --}}
            <div class="cnt-info-card">
                <div class="cnt-info-icon cnt-icon-purple">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                </div>
                <h3>{{ __('contact.info_cards.hours.title') }}</h3>
                <p class="cnt-info-sub">{{ __('contact.info_cards.hours.subtitle') }}</p>
                <p class="cnt-info-val">{{ __('contact.info_cards.hours.values.0') }}</p>
                <p class="cnt-info-val">{{ __('contact.info_cards.hours.values.1') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- Contact Form + Map --}}
<section class="cnt-form-section">
    <div class="cnt-container">
        <div class="cnt-form-grid">
            {{-- Form Card --}}
            <div class="cnt-card cnt-form-card">
                <div class="cnt-card-header">
                    <h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cnt-card-icon">
                            <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z" />
                            <path d="m21.854 2.147-10.94 10.939" />
                        </svg>
                        {{ __('contact.form.title') }}
                    </h3>
                    <p>{{ __('contact.form.subtitle') }}</p>
                </div>
                <div class="cnt-card-body">
                    <form class="cnt-form" id="form">
                        <input type="hidden" name="to_name" value="SIN Travels Admin">
                        <div class="cnt-form-row">
                            <div class="cnt-field">
                                <label for="cnt-name">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                    {{ __('contact.form.fields.full_name') }}
                                </label>
                                <input type="text" id="cnt-name" name="from_name" placeholder="{{ __('contact.form.placeholders.full_name') }}" required>
                            </div>
                            <div class="cnt-field">
                                <label for="cnt-email">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="20" height="16" x="2" y="4" rx="2" />
                                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                    </svg>
                                    {{ __('contact.form.fields.email') }}
                                </label>
                                <input type="email" id="cnt-email" name="reply_to" placeholder="{{ __('contact.form.placeholders.email') }}" required>
                            </div>
                        </div>
                        <div class="cnt-form-row">
                            <div class="cnt-field">
                                <label for="cnt-phone">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                    </svg>
                                    {{ __('contact.form.fields.phone') }}
                                </label>
                                <input type="text" id="cnt-phone" name="mobile" placeholder="{{ __('contact.form.placeholders.phone') }}">
                            </div>
                            <div class="cnt-field">
                                <label for="cnt-company">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="16" height="20" x="4" y="2" rx="2" ry="2" />
                                        <path d="M9 22v-4h6v4" />
                                        <path d="M8 6h.01" />
                                        <path d="M16 6h.01" />
                                        <path d="M12 6h.01" />
                                        <path d="M12 10h.01" />
                                        <path d="M12 14h.01" />
                                        <path d="M16 10h.01" />
                                        <path d="M16 14h.01" />
                                        <path d="M8 10h.01" />
                                        <path d="M8 14h.01" />
                                    </svg>
                                    {{ __('contact.form.fields.company') }}
                                </label>
                                <input type="text" id="cnt-company" name="company" placeholder="{{ __('contact.form.placeholders.company') }}">
                            </div>
                        </div>
                        <div class="cnt-field">
                            <label for="cnt-service">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                                    <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                    <path d="M10 9H8" />
                                    <path d="M16 13H8" />
                                    <path d="M16 17H8" />
                                </svg>
                                {{ __('contact.form.fields.service') }}
                            </label>
                            <select id="cnt-service" name="service" required>
                                <option value="" disabled selected>{{ __('contact.form.placeholders.service') }}</option>
                                <option value="Job Placement Services">{{ __('contact.form.services.job_placement') }}</option>
                                <option value="Career Counseling">{{ __('contact.form.services.career_counseling') }}</option>
                                <option value="Skills Training">{{ __('contact.form.services.skills_training') }}</option>
                                <option value="Visa Assistance">{{ __('contact.form.services.visa_assistance') }}</option>
                                <option value="Corporate Solutions">{{ __('contact.form.services.corporate_solutions') }}</option>
                                <option value="Other">{{ __('contact.form.services.other') }}</option>
                            </select>
                        </div>
                        <div class="cnt-field">
                            <label for="cnt-message">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                                </svg>
                                {{ __('contact.form.fields.message') }}
                            </label>
                            <textarea id="cnt-message" name="message" rows="5" placeholder="{{ __('contact.form.placeholders.message') }}" required></textarea>
                        </div>
                        <button type="submit" class="cnt-submit-btn" id="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z" />
                                <path d="m21.854 2.147-10.94 10.939" />
                            </svg>
                            {{ __('contact.form.submit') }}
                        </button>
                    </form>
                </div>
            </div>

            {{-- Map Card --}}
            <div class="cnt-card cnt-map-card">
                <div class="cnt-card-header">
                    <h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cnt-card-icon">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        {{ __('contact.map.title') }}
                    </h3>
                    <p>{{ __('contact.map.subtitle') }}</p>
                </div>
                <div class="cnt-map-wrapper">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126648.16814890831!2d79.71021589726561!3d7.268668500000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2e9ce44ff29f5%3A0x8a4d9aa5522b98aa!2sSIN%20Travels%20%26%20Manpower%20(PVT)%20LTD!5e0!3m2!1sen!2slk!4v1755592598242!5m2!1sen!2slk"
                        width="100%"
                        height="100%"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        style="border:0;">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQ Section --}}
<section class="cnt-faq-section">
    <div class="cnt-container">
        <div class="cnt-section-header">
            <h2>{{ __('contact.faq.title') }}</h2>
            <p>{{ __('contact.faq.subtitle') }}</p>
        </div>
        <div class="cnt-faq-grid">
            <div class="cnt-faq-card">
                <h4>{{ __('contact.faq.items.0.question') }}</h4>
                <p>{{ __('contact.faq.items.0.answer') }}</p>
            </div>
            <div class="cnt-faq-card">
                <h4>{{ __('contact.faq.items.1.question') }}</h4>
                <p>{{ __('contact.faq.items.1.answer') }}</p>
            </div>
            <div class="cnt-faq-card">
                <h4>{{ __('contact.faq.items.2.question') }}</h4>
                <p>{{ __('contact.faq.items.2.answer') }}</p>
            </div>
            <div class="cnt-faq-card">
                <h4>{{ __('contact.faq.items.3.question') }}</h4>
                <p>{{ __('contact.faq.items.3.answer') }}</p>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script type="text/javascript"
  src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

<script type="text/javascript">
  emailjs.init('e5WgsuFrO_91waFQs')
</script>

<script type="text/javascript">
const btn = document.getElementById('button');

document.getElementById('form')
 .addEventListener('submit', function(event) {
   event.preventDefault();

   const originalText = btn.textContent;
   btn.textContent = 'Sending...';

   const serviceID = 'default_service';
   const templateID = 'template_7n2puyj';

   emailjs.sendForm(serviceID, templateID, this)
    .then(() => {
      btn.textContent = originalText;
      alert('Sent!');
      document.getElementById('form').reset();
    }, (err) => {
      btn.textContent = originalText;
      alert(JSON.stringify(err));
    });
});
</script>
@endpush