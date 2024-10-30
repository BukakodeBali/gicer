<!-- quick contact -->
<div id="quick-contact" class="{{ request()->routeIs('home') || request()->routeIs('about') ? 'bg-white' : 'bg-transparent' }}">
    <div class="uk-container">
        <div>
            <div class="container-info">
                <div>
                    <h3 class="title">Siap untuk mensertifikasi perusahaan Anda bersama kami?</h3>
                    <div class="cta-section">
                        <a target="_blank" href="{{ url('assets/form/form-pendaftaran-gic.pdf') }}">
                            <button class="uk-button uk-button-primary btn-ksm-slider">Form Sertifikasi</button>
                        </a>
                        <a href="{{ url('kontak') }}">
                            <div>
                                Kontak kami
                                <span class="pl-5" uk-icon="icon: arrow-right;"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay-bg"></div>
</div>
<!-- end of quick contact -->
