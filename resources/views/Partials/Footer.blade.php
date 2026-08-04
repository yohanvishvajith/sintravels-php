<div class="footer">
    <Div class="footer-container">
        <div class="footer-content"><b>{{ __('footer.find_us') }}</b>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d506592.6720317656!2d79.862651!3d7.268669!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2e9ce44ff29f5%3A0x8a4d9aa5522b98aa!2sSIN%20Travels%20%26%20Manpower%20(PVT)%20LTD!5e0!3m2!1sen!2slk!4v1771830479095!5m2!1sen!2slk" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="footer-content"><b>{{ __('footer.quick_links') }}</b>
            <ul>
                <a href="/"><li>{{ __('footer.links.home') }}</li></a>
                <a href="/jobs"><li>{{ __('footer.links.browse_jobs') }}</li></a>
                <a href="/services"><li>{{ __('footer.links.services') }}</li></a>
                <a href="/about"><li>{{ __('footer.links.about') }}</li></a>
                <a href="/contact"><li>{{ __('footer.links.contact') }}</li></a>
            </ul>

        </div>
        <div class="footer-content"><b>{{ __('footer.services') }}</b>
            <ul>
                <li>{{ __('footer.service_items.international_placements') }}</li>
                <li>{{ __('footer.service_items.visa_assistance') }}</li>
                <li>{{ __('footer.service_items.legal_documentation') }}</li>
                <li>{{ __('footer.service_items.government_training') }}</li>
                <li>{{ __('footer.service_items.corporate_solutions') }}</li>
            </ul>
        </div>
        <div class="footer-content"><b>{{ __('footer.contact_info') }}</b>
            <ul>
                <li>{{ __('footer.contact_items.address') }}</li>
                <li>{{ __('footer.contact_items.phone') }}</li>
                <li>{{ __('footer.contact_items.email') }}</li>
            </ul>
        </div>


    </Div>
    <div class="footer-bottom">
        <div class="footer-bottom-first">
            <div class="social-icons">
                <a href=""><img src="/images/social media/facebook.png"  loading="lazy"alt="facebookLogo" class="footer-social-icon"></a>
                <a href=""><img src="/images/social media/youtube.png" loading="lazy" alt="youtubeLogo" class="footer-social-icon"></a>
                <a href=""><img src="/images/social media/whatsapp.png"  loading="lazy"alt="instagramLogo" class="footer-social-icon"></a>
                <a href=""><img src="/images/social media/tiktok.png"  loading="lazy"alt="tiktokLogo" class="footer-social-icon"></a>
                <ul>
                    <li>{{ __('footer.reg_number') }}</li>
                    <li>{{ __('footer.privacy_policy') }}</li>
                    <li>{{ __('footer.terms_of_service') }}</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom-last">
            <p>{{ str_replace(':year', date('Y'), __('footer.copyright')) }}</p>
        </div>
    </div>
</div>