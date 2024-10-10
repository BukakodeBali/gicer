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
            <div class="uk-navbar-center">
                <ul class="uk-navbar-nav uk-visible@m">
                    <li class="{{ request()->routeIs('home') ? 'uk-active' : '' }}"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="{{ request()->routeIs('about') ? 'uk-active' : '' }}"><a href="{{ url('tentang-kami') }}">Tentang Kami</a></li>
                    <li class="{{ request()->routeIs('certification-process') ? 'uk-active' : '' }}"><a href="{{ url('alur-sertifikasi') }}">Sertifikasi</a></li>
                    <li class="{{ request()->routeIs('contact') ? 'uk-active' : '' }}"><a href="{{ url('kontak') }}">Kontak</a></li>
                </ul>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav uk-visible@m">
                    <li>
                        <a href="https://client.gicer.id/login">
                            <div class="pills-button">Verifikasi</div>
                        </a>
                    </li>
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
