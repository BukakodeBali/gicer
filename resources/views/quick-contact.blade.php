<!-- quick contact -->
<div id="quick-contact" class="{{ request()->routeIs('home') || request()->routeIs('about') || request()->routeIs('certification-process') || request()->routeIs('layanan') ? 'bg-white' : 'bg-transparent' }}">
    <div class="uk-container">
        <div>
            <div class="container-info">
                <div>
                    <h3 class="title">Siap untuk di sertifikasi oleh kami?</h3>
                    <div class="cta-section">
                        <a href="{{ url('kontak') }}">
                            <button class="uk-button uk-button-primary btn-ksm-slider">
                                <div>
                                    Kontak kami
                                    <span class="pl-5" uk-icon="icon: arrow-right;"></span>
                                </div>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay-bg"></div>
</div>
<!-- end of quick contact -->
