<div id="latest-news" class="uk-width-2-5@m uk-width-1-3@l uk-width-2-5@xl">
    <div class="uk-container">
        <!-- Search -->
        <p class="hes"><span>Search</span></p>
        <!-- <form class="uk-form-stacked"> -->
        <div class="form-search-btn"  uk-scrollspy="cls: uk-animation-fade; delay: 600">
            <form action="{{ url('berita') }}" class="search" method="GET">
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" placeholder="Cari berita" name="keyword">
                </div>
                <button class="uk-button uk-button-primary btn-ksm-slider btn-search">
                    <span uk-icon="icon: search; ratio: 0.8"></span>
                </button>
            </form>
        </div>
        <!-- </form> -->
        <!-- end Search -->
        <!-- berita terhini -->
        <p class="hes"><span>Berita Terkini</span></p>
        @foreach($latestArticles as $article)
            <?php
                $gambar = $article['image']['name'] ?? null;
                $gambar = $gambar ? asset('images/articles/600/'.$gambar) : '';
                $latestLink = $article['link']['link'] ?? '';
            ?>
            <a href="{{ url('berita/'.$latestLink) }}" class="a-clean">
                <div class="uk-text-center uk-grid-collapse berita-left" uk-grid uk-scrollspy="cls: uk-animation-fade; delay: 600">
                    <div class="uk-width-1-3 radius-hidden-10">
                        <div class="uk-cover-container img-berita-left">
                            <img src="{{ $gambar }}" alt="{{ $article['title'] }}" uk-cover>
                        </div>
                    </div>
                    <div class="uk-width-expand berita-text-left">
                        <table class="berita-info">
                            <tr>
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
                            </tr>
                        </table>
                        <p class="code-berita-left">{{ $article['title'] }}</p>
                    </div>
                </div>
            </a>
        @endforeach
        <!-- end berita terkini -->
    </div>
</div>
