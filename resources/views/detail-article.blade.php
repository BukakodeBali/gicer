@extends('layout')
@section('content')
    <?php
        $gambar = $article['image']['name'] ?? null;
        $gambar = $gambar ? asset('images/articles/'.$gambar) : '';
        $categories = $article['categories'];
    ?>
    <!-- list berita -->
    <div class="uk-container">
        <div class="uk-grid-match berita" uk-grid>
            <div class="uk-width-expand@m">
                <!-- artikel -->
                <article class="uk-article" uk-scrollspy="cls: uk-animation-fade; delay: 600">
                    <!-- title head -->
                    <h1 class="uk-article-title title-article">{{ $article['title'] }}</h1>
                    <p class="uk-article-meta mt-5 mb-10">
                        @foreach($categories as $category)
                            <?php
                                $categoryLink = $category['link']['link'] ?? '';
                            ?>
                            <span uk-icon="icon: list; ratio: 0.8"></span> <a href="{{ url('kategori/'.$categoryLink) }}">{{ $category['name'] }}</a>
                        @endforeach
                        <span uk-icon="icon: calendar; ratio: 0.8">
						    	</span> {{ $article['formatted_published_at'] }}
                    </p>
                    <!-- end title head -->
                    <!-- image -->
                    <div class="uk-cover-container uk-height-medium">
                        <img src="{{ $gambar }}" alt="{{ $article['title'] }}" uk-cover>
                    </div>
                    <!-- end image -->
                    <!-- content from editor -->
                    <div class="uk-container mt-10">
                        {!! $article['content'] !!}
                    </div>
                    <!-- end content from editor -->
                    <hr>
                    <div class="uk-flex">
                        <p class="share-to">share to : </p>
                        <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
                        <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="facebook"></a>
                        <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="youtube"></a>
                        <a href="" class="uk-icon-button" uk-icon="instagram"></a>
                    </div>
                    <hr>
                    <div class="mt-10"></div>
                </article>
                <!-- end of artikel -->
            </div>
            @include('latest-article')
        </div>
    </div>
    <!-- end list berita -->
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
