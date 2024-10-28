@extends('layout')
@section('content')
    <!-- 404 -->
    <div class="not-found" style="background-image: url('{{ asset('assets/images/base/logo-gray.png') }}');">
        <div class="uk-text-center">
            <img src="{{ asset('assets/images/base/404.png') }}" alt="404" uk-scrollspy="cls: uk-animation-fade; delay: 100" class="mb-30"><br>
            <a href="{{ url('/') }}">
                <button class="uk-button uk-button-primary btn-ksm uk-scrollspy-inview uk-animation-fade" uk-scrollspy="cls: uk-animation-fade; delay: 400" style="">Kembali ke halaman Utama</button>
            </a>
        </div>
    </div>
    <!-- end 404 -->
@endsection
