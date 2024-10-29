@extends('layout')
@section('content')
    <!-- alur sertifikasi -->
    <div id="visi-misi" class="bg-dots-container struktur">
        <div class="uk-container uk-container-small" uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 500">
            <div class="uk-text-center" style="margin-bottom: 15px;">
                <h3>Alur Sertifikasi</h3>
            </div>
            <img src="{{ asset('assets/images/base/alur-sertifikasi.png') }}" class="pt-15" alt="struktur-organisasi">
        </div>
    </div>
@endsection
@push('menu')
    @include('menu')
@endpush

@push('quick-contact')
    @include('quick-contact')
@endpush

@push('footer')
    @include('footer')
@endpush

@push('offcanvas')
    @include('offcanvas')
@endpush
