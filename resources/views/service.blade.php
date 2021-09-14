@extends('layout')
@section('content')
    <?php $image = 'images/services/'.$service['image']['name'] ?>
    <div id="layanan" class="uk-container-expand">
        <div class="uk-grid-collapse uk-grid-match" uk-grid>
            <div class="uk-width-1-3@m uk-width-2-5@l left-bg" style="background: url('{{ asset($image) }}')" uk-scrollspy="cls: uk-animation-slide-left-medium; delay: 700">
                <div class="uk-card uk-card-default uk-card-body overlaping-container left m-h-350"></div>
            </div>

            <div class="uk-width-expand@m right-bg" uk-scrollspy="cls: uk-animation-slide-right-medium; delay: 700">
                <div id="layanan-info" class="uk-card uk-card-default uk-card-body overlaping-container right">
                    <div class="layanan-info">
                        <div class="middle">
                            {!! $service['content'] !!}
                        </div>
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
