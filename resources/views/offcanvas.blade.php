<!-- offcanvas -->
<div id="offcanvas" uk-offcanvas="mode: slide; flip: true; overlay: true" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
        <div class="uk-panel flex-panel ">
            <p class="uk-offcanvas-close">
                <img src="{{ asset('assets/images/base/x-ico.png') }}" alt="x-ico">
            </p>
            <img src="{{ asset('assets/images/base/logo-nav.png') }}" alt="logo">
            <div class="mt-10 mb-10"></div>
            <ul class="uk-nav uk-nav-default">
                <li class="{{ request()->routeIs('home') ? 'uk-active' : '' }}"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="{{ request()->routeIs('about') ? 'uk-active' : '' }}"><a href="{{ url('tentang-kami') }}">Tentang Kami</a></li>
                <li class="{{ request()->routeIs('layanan') ? 'uk-open' : '' }}">
                    <a class="uk-accordion-title" href="#">Layanan</a>
                    <div class="uk-accordion-content">
                        <ul class="menu-list" uk-accordion="collapsible: false">
                            <li><a href="{{ url('layanan/iso-9001-2015-sistem-manajemen-mutu') }}">ISO 9001:2015</a></li>
                            <li><a href="{{ url('layanan/iso-14001-2015-sistem-manajemen-lingkungan') }}">ISO 14001:2015</a></li>
                            <li><a href="{{ url('layanan/iso-45001-2018-sistem-manajemen-kesehatan-keselamatan-kerja') }}">ISO 45001:2018</a></li>
                            <li><a href="{{ url('layanan/iso-37001-2016-sistem-manajemen-anti-penyuapan') }}">ISO 37001:2016</a></li>
                        </ul>
                    </div>
                </li>
                <li class="{{ request()->routeIs('certification-process') ? 'uk-active' : '' }}"><a href="{{ url('alur-sertifikasi') }}">Alur Sertifikasi</a></li>
                <li><a href="https://client.certificationimprovement.com/login">Direktori</a></li>
                <li class="{{ request()->routeIs('contact') ? 'uk-active' : '' }}"><a href="{{ url('kontak') }}">Hubungi Kami</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- end of offcanvas -->
<!-- end of wabtn -->
<!-- <a id="wa_link" target="_blank" href="https://api.whatsapp.com/send?phone=622150106260">
    <img class="img-circle wa-icon" alt="wa-icon" src="{{ asset('assets/images/base/whatsapp-logo.png') }}">
</a> -->
<!-- end of wabtn -->
