<div id="nav" uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; top:200" class="uk-navbar-container tm-navbar-container uk-sticky" style="background-color: #fff" uk-scrollspy="cls: uk-animation-slide-top-small; delay: 500;">
    <div class="uk-container">
        <nav class="uk-navbar" uk-navbar>
            <div class="uk-navbar-left">
                <a href="{{ url('/') }}" class="uk-navbar-item uk-logo uk-hidden@m">
                    <img src="{{ asset('assets/images/base/logo-nav-1.png')  }}" class="uk-margin-small-right" alt="logo" style="height: 45px;">
                </a>
                <a href="{{ url('/') }}" class="uk-navbar-item uk-logo uk-visible@m">
                    <img src="{{ asset('assets/images/base/logo-nav-1.png') }}" class="uk-margin-small-right" alt="logo" style="height: 50px;">
                </a>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav uk-visible@m">
                    <li class="{{ request()->routeIs('home') ? 'uk-active' : '' }}"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="{{ request()->routeIs('about') ? 'uk-active' : '' }}"><a href="{{ url('tentang-kami') }}">Tentang Kami</a></li>
                    <li class="{{ request()->routeIs('layanan') ? 'uk-active' : '' }}">
                        <a href="#">Layanan</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
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
                <a uk-navbar-toggle-icon="" href="#offcanvas" uk-toggle="" class="uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="navbar-toggle-icon">
                        <rect y="9" width="20" height="2"></rect>
                        <rect y="3" width="20" height="2"></rect>
                        <rect y="15" width="20" height="2"></rect>
                    </svg>
                </a>
            </div>
        </nav>
    </div>
</div>
