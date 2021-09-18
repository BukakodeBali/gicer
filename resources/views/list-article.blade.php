@extends('layout')

@section('content')
    <!-- list berita -->
    <div class="uk-container">
        <div class="uk-grid-match berita" uk-grid>
            <div class="uk-width-expand@m">
                <!-- berita -->
                <div id="berita" class="transparent">
                    <div class="uk-container">
                        <p class="hes" uk-scrollspy="cls: uk-animation-slide-top; delay: 300"><span>{{ $section ?? '' }}</span></p>
                        <div class="uk-child-width-1-2@s uk-child-width-1-2@m grid-berita uk-grid-small" uk-grid uk-scrollspy="cls: uk-animation-fade; target: .uk-card; delay: 400;">
                            @foreach($articles['data'] as $article)
                                <?php
                                    $gambar = $article['image']['name'] ?? null;
                                    $gambar = $gambar ? asset('images/articles/600/'.$gambar) : '';
                                    $categories = $article['categories'];
                                    $listLink = $article['link']['link'];
                                ?>
                                <div class="translated">
                                    <a href="{{ url('berita/'.$listLink) }}">
                                        <div class="uk-card uk-card-small card-berita">
                                            <div class="uk-card-media-top">
                                                <div class="uk-cover-container image-height">
                                                    <img src="{{ $gambar }}" alt="{{ $article['title'] }}" uk-cover>
                                                </div>
                                            </div>
                                            <div class="uk-card-body text-container">
                                                <p class="code-berita">{{ $article['title'] }}</p>
                                                <div class="module line-clamp">
                                                    <p class="desc-berita">{{ substr(strip_tags($article['content']), 0, 120) }}</p>
                                                </div>
                                                <table class="berita-info">
                                                    <td class="left">
                                                        @foreach($categories as $category)
                                                            <?php
                                                                $categoryLink = $category['link']['link'] ?? '';
                                                            ?>
                                                            <span uk-icon="icon: list; ratio: 0.8"></span>
                                                            <a href="{{ url('kategori/'.$categoryLink) }}">{{ $category['name'] }}</a>
                                                        @endforeach
                                                    </td>
                                                    <td class="right">
                                                        <span uk-icon="icon: calendar; ratio: 0.8"></span> {{ $article['formatted_published_at'] }}
                                                    </td>
                                                </table>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div style="padding: 30px 0">
                            <ul class="uk-pagination uk-flex-center mb-0" uk-margin>
                                <li><a href="{{ $articles['prev_page_url'] }}"><span uk-pagination-previous></span></a></li>
                                    @for($i = 1; $i <= $articles['last_page']; $i++)
                                        @if($i === $articles['current_page'])
                                            <li class="uk-active"><a href="{{ url($articles['path'].'?page='.$i) }}">{{ $i }}</a></li>
                                        @else
                                            <li><a href="{{ url($articles['path'].'?page='.$i) }}">{{ $i }}</a></li>
                                        @endif
                                    @endfor
                                <li><a href="{{ $articles['next_page_url'] }}"><span uk-pagination-next></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end of berita -->
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
