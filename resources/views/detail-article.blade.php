@extends('layout')
@section('content')
    <?php
        $gambar = $article['image']['name'] ?? null;
        $gambar = $gambar ? asset('images/articles/'.$gambar) : '';
        $categories = $article['categories'];
    ?>
    <!-- list berita -->
    <div id="detail-news" class="uk-container">
        <div class="uk-grid-match berita" uk-grid>
            <div class="uk-width-expand@m">
                <!-- artikel -->
                <article class="uk-article" uk-scrollspy="cls: uk-animation-fade; delay: 600">
                    <!-- title head -->
                    <h1 class="uk-article-title title-article">{{ $article['title'] }}</h1>
                    <div class="uk-flex category-tag">
                        <p class="mr-10">
                            @foreach($categories as $category)
                                <?php
                                    $link = $category['link']['link'] ?? '';
                                ?>
                                <a href="{{ url('kategori/'.$link) }}">{{ $category['name'] }}</a>
                            @endforeach
                        </p>
                        <p>{{ $article['formatted_published_at'] }}</p>
                    </div>
                    <!-- end title head -->
                    <!-- image -->
                    <div class="uk-cover-container uk-height-medium radius-hidden-10">
                        <img src="{{ $gambar }}" alt="{{ $article['title'] }}" uk-cover>
                    </div>
                    <!-- end image -->
                    <!-- content from editor -->
                    <div class="uk-container mt-10">
                        {!! $article['content'] !!}
                    </div>
                    <!-- end content from editor -->
                    <div class="tags-container">
                        <span class="uk-label tag-title">Tags : </span>
                        @foreach($tags as $tag)
                            <span class="uk-label">{{ $tag['name'] }}</span>
                        @endforeach
                    </div>
                    <hr class="mt-15">
                    <div class="uk-flex">
                        <p class="share-to">share to : </p>
                        <a href="http://twitter.com/share?text={{ $article['title'] }}&url={{ url('/berita') }}/{{ $article['link']['link'] }}" class="uk-icon-button uk-margin-small-right" target="_blank" uk-icon="twitter"></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/berita') }}/{{ $article['link']['link'] }}" class="uk-icon-button uk-margin-small-right" target="_blank" uk-icon="facebook"></a>
                        <a href="whatsapp://send?text={{ url('/berita') }}/{{ $article['link']['link'] }}" class="uk-icon-button" target="_blank" uk-icon="whatsapp"></a>
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
