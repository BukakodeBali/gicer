<!-- offcanvas -->
<div id="offcanvas" uk-offcanvas="mode: slide; flip: true; overlay: true" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
        <div class="uk-panel flex-panel ">
            <p class="uk-offcanvas-close">
                <img src="{{ asset('assets/images/base/x-ico.png') }}" alt="x-ico">
            </p>
            <img src="{{ asset('assets/images/base/logo-nav.png') }}" alt="logo">
            <div class="divider mt-10 mb-5"></div>
            <ul class="uk-nav uk-nav-default">
                <li class="{{ request()->routeIs('home') ? 'uk-active' : '' }}"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="{{ request()->routeIs('about') ? 'uk-active' : '' }}"><a href="{{ url('tentang-kami') }}">Tentang Kami</a></li>
                <li class="{{ request()->routeIs('certification-process') ? 'uk-active' : '' }}"><a href="{{ url('alur-sertifikasi') }}">Sertifikasi</a></li>
                <li><a href="https://client.certificationimprovement.com/login">Direktori</a></li>
                <li class="{{ request()->routeIs('contact') ? 'uk-active' : '' }}"><a href="{{ url('kontak') }}">Hubungi Kami</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- end of offcanvas -->
<!-- end of wabtn -->
<a id="wa_link" target="_blank" href="https://api.whatsapp.com/send?phone=6281236979232">
    <img class="img-circle wa-icon" alt="wa-icon" src="{{ asset('assets/images/base/whatsapp-logo.png') }}">
</a>
<!-- end of wabtn -->
