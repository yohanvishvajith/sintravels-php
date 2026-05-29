@extends('Layouts.main')

@push('styles')
@vite(['resources/css/contact.css'])
@endpush
@section('title', 'Contact Us - SIN Travels')
@section('content')

{{-- Breadcrumb --}}
<x-page-breadcrumb
    page="Contact"
    title="Contact Us"
    subtitle="Get in touch with our expert team for personalized assistance" />

{{-- Hero Banner --}}
<section class="cnt-hero">
    <div class="cnt-hero-inner">
        <div class="cnt-hero-content">
            <h2>Let's Start Your Journey Together</h2>
            <p>Whether you're seeking international career opportunities or looking to hire top talent, our team is here to help you achieve your goals.</p>
            <div class="cnt-hero-badges">
                <div class="cnt-hero-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                    </svg>
                    <span>Quick Response</span>
                </div>
                <div class="cnt-hero-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                        <path d="M2 12h20" />
                    </svg>
                    <span>Global Expertise</span>
                </div>
                <div class="cnt-hero-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21.801 10A10 10 0 1 1 17 3.335" />
                        <path d="m9 11 3 3L22 4" />
                    </svg>
                    <span>Proven Results</span>
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
                <h3>Phone</h3>
                <p class="cnt-info-sub">Call us during business hours</p>
                <p class="cnt-info-val">+94 334 200 240</p>
                <p class="cnt-info-val">+94 761 418 949</p>
            </div>
            {{-- Email --}}
            <div class="cnt-info-card">
                <div class="cnt-info-icon cnt-icon-green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="16" x="2" y="4" rx="2" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg>
                </div>
                <h3>Email</h3>
                <p class="cnt-info-sub">Send us an email anytime</p>
                <p class="cnt-info-val">sintravelsandmanpower@gmail.com</p>
            </div>
            {{-- Address --}}
            <div class="cnt-info-card">
                <div class="cnt-info-icon cnt-icon-orange">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                        <circle cx="12" cy="10" r="3" />
                    </svg>
                </div>
                <h3>Address</h3>
                <p class="cnt-info-sub">Visit our office</p>
                <p class="cnt-info-val">162/6 Chilaw Road</p>
                <p class="cnt-info-val">Kochchikade, Sri Lanka</p>
            </div>
            {{-- Business Hours --}}
            <div class="cnt-info-card">
                <div class="cnt-info-icon cnt-icon-purple">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                </div>
                <h3>Business Hours</h3>
                <p class="cnt-info-sub">We are available during these hours</p>
                <p class="cnt-info-val">Mon - Fri: 9:00 AM - 6:00 PM</p>
                <p class="cnt-info-val">Sat: 9:00 AM - 1:00 PM</p>
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
                        Send us a Message
                    </h3>
                    <p>Fill out the form below and we'll get back to you within 24 hours</p>
                </div>
                <div class="cnt-card-body">
                    <form class="cnt-form" method="POST" action="#">
                        @csrf
                        <div class="cnt-form-row">
                            <div class="cnt-field">
                                <label for="cnt-name">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                    Full Name *
                                </label>
                                <input type="text" id="cnt-name" name="name" placeholder="Enter your full name" required>
                            </div>
                            <div class="cnt-field">
                                <label for="cnt-email">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="20" height="16" x="2" y="4" rx="2" />
                                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                    </svg>
                                    Email Address *
                                </label>
                                <input type="email" id="cnt-email" name="email" placeholder="Enter your email" required>
                            </div>
                        </div>
                        <div class="cnt-form-row">
                            <div class="cnt-field">
                                <label for="cnt-phone">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                    </svg>
                                    Phone Number
                                </label>
                                <input type="text" id="cnt-phone" name="phone" placeholder="Enter your phone number">
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
                                    Company (Optional)
                                </label>
                                <input type="text" id="cnt-company" name="company" placeholder="Enter company name">
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
                                Service Interested In *
                            </label>
                            <select id="cnt-service" name="service" required>
                                <option value="" disabled selected>Select a service</option>
                                <option value="Job Placement Services">Job Placement Services</option>
                                <option value="Career Counseling">Career Counseling</option>
                                <option value="Skills Training">Skills Training</option>
                                <option value="Visa Assistance">Visa Assistance</option>
                                <option value="Corporate Solutions">Corporate Solutions</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="cnt-field">
                            <label for="cnt-message">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                                </svg>
                                Message *
                            </label>
                            <textarea id="cnt-message" name="message" rows="5" placeholder="Tell us about your requirements..." required></textarea>
                        </div>
                        <button type="submit" class="cnt-submit-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z" />
                                <path d="m21.854 2.147-10.94 10.939" />
                            </svg>
                            Send Message
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
                        Find Our Office
                    </h3>
                    <p>Visit us at our headquarters in Kochchikade</p>
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
            <h2>Frequently Asked Questions</h2>
            <p>Quick answers to common questions</p>
        </div>
        <div class="cnt-faq-grid">
            <div class="cnt-faq-card">
                <h4>How long does the placement process take?</h4>
                <p>The placement process typically takes 2-8 weeks depending on the position and visa requirements. We keep you updated throughout the entire process.</p>
            </div>
            <div class="cnt-faq-card">
                <h4>Do you charge job seekers for your services?</h4>
                <p>No, our job placement services are completely free for job seekers. We are compensated by the employers who hire our candidates.</p>
            </div>
            <div class="cnt-faq-card">
                <h4>Which countries do you place candidates in?</h4>
                <p>We have partnerships in 25+ countries including UAE, Saudi Arabia, Kuwait, Singapore, Canada, Australia, UK, and many more.</p>
            </div>
            <div class="cnt-faq-card">
                <h4>Do you provide visa assistance?</h4>
                <p>Yes, we provide comprehensive visa assistance including documentation support, application guidance, and interview preparation.</p>
            </div>
        </div>
    </div>
</section>

@endsection