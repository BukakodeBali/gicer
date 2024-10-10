@extends('layout')
@section('content')
    <?php $image = 'images/services/'.$service['image']['name'] ?>
    <div id="layanan" class="uk-container-expand">
        <div class="uk-container">
            <div class="layanan-image">
                <img src="{{ asset($image) }}" alt="service-image" uk-cover>
            </div>
            <div id="layanan-info" class="">
                <div class="layanan-info">
                    <div class="middle">
                        {!! $service['content'] !!}
                    </div>
                </div>
            </div>
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
