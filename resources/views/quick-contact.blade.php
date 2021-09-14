<!-- quick contact -->
<div id="quick-contact" class="uk-container-expand">
    <div class="uk-grid-collapse uk-grid-match" uk-grid>
        <div class="uk-width-expand@m left-bg" uk-scrollspy="cls: uk-animation-slide-left-medium; delay: 500">
            <div class="uk-card uk-card-default uk-card-body overlaping-container left m-h-350">
                <img src="{{ url('assets/images/base/logo-white.png') }}" class="logo-icon">
            </div>
            <div class="gradient-bar"></div>
        </div>
        <div class="uk-width-1-3@m uk-width-2-5@l right-bg" uk-scrollspy="cls: uk-animation-slide-right-medium; delay: 500">
            <div class="uk-card uk-card-default uk-card-body overlaping-container right">
                <div class="container-info">
                    <h3 class="title">Sertifikasi Perusahaan anda bersama kami</h3>
                    <p class="description inversed">Hubungi kami untuk mendapatkan layanan dan penawaran terbaik.</p>
                    <div>
                        <a target="_blank" href="{{ url('assets/form/form-pendaftaran.pdf') }}">
                            <button class="uk-button uk-button-primary btn-ksm-light off-border btn-adjs">Form Sertifikasi</button>
                        </a>
                        <a href="{{ url('kontak') }}">
                            <button class="uk-button uk-button-primary btn-ksm-light off-border btn-adjs flo-r">Kontak</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of quick contact -->
