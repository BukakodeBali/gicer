@extends('layout')
@section('content')
<!-- banner -->
<div id="slideshow-ksm" class="uk-position-relative uk-visible-toggle uk-light slideshow-ksm uk-container" tabindex="-1" uk-slideshow="animation: fade; autoplay: false; pause-on-hover: true;" uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 400">
    <?php
    $slides[] = [
        'image' => 'assets/images/banner/slider1.jpg',
        'text_1' => 'ISO 9001:2015',
        'text_2' => 'Sistem Manajemen Mutu',
        'text_3' => 'Dengan di sertifikasi ISO 9001, berarti organiasi anda telah mendapatkan sertifikasi yang diakui secara global dalam bidang sistem manajemen mutu.',
        'link' => url('layanan/iso-9001-2015-sistem-manajemen-mutu'),
        'icon' => 'assets/images/banner/ico1.png'
    ];

    $slides[] = [
        'image' => 'assets/images/banner/slider2.jpg',
        'text_1' => 'ISO 14001:2015',
        'text_2' => 'Sistem Manajemen Lingkungan',
        'text_3' => 'Dengan di sertifikasi ISO 14001, berarti organiasi anda telah mendapatkan sertifikasi yang diakui secara global dalam bidang sistem manajemen lingkungan.',
        'link' => url('layanan/iso-14001-2015-sistem-manajemen-lingkungan'),
        'icon' => 'assets/images/banner/ico2.png'
    ];

    $slides[] = [
        'image' => 'assets/images/banner/slider3.jpg',
        'text_1' => 'ISO 45001:2018',
        'text_2' => 'Sistem Manajemen Kesehatan dan Keselamatan Kerja',
        'text_3' => 'Dengan di sertifikasi ISO 45001, berarti organiasi anda telah mendapatkan sertifikasi yang diakui secara global dalam bidang sistem manajemen kesehatan dan keselamatan kerja.',
        'link' => url('layanan/iso-45001-2018-sistem-manajemen-kesehatan-keselamatan-kerja'),
        'icon' => 'assets/images/banner/ico3.png'
    ];

    $slides[] = [
        'image' => 'assets/images/banner/slider8.jpg',
        'text_1' => 'ISO 37001:2016',
        'text_2' => 'Sistem Manajemen Anti Penyuapan',
        'text_3' => 'Dengan di sertifikasi ISO 37001, berarti organiasi anda telah mendapatkan sertifikasi yang diakui secara global dalam bidang sistem manajemen anti penyuapan.',
        'link' => url('layanan/iso-37001-2016-sistem-manajemen-anti-penyuapan'),
        'icon' => 'assets/images/banner/ico8.png'
    ];
    ?>

    <ul class="uk-slideshow-items">
        <li>
            <div class="content-slider">
                <div class="uk-grid-collapse" uk-grid>
                    <div class="uk-width-expand@m textual-content">
                        <p uk-slider-parallax="y: 110,-110;" class="code-layanan">Lembaga Sertifikasi</p>
                        <p uk-slider-parallax="y: 100,-100;" class="name-layanan">Sertifikasi ISO Independen Bertaraf Internasional</p>
                        <p uk-slider-parallax="y: 90,-90;" class="desc-layanan">Global Improvement Certification merupakan lembaga sertifikasi untuk sistem manajemen internasional (ISO). </p>
                        <a href="{{ url('tentang-kami') }}">
                            <button uk-slider-parallax="y: 80,-80;" class="uk-button uk-button-primary btn-ksm-slider">
                                Lebih Lanjut
                                <span class="pl-5" uk-icon="icon: arrow-right;"></span>
                            </button>
                        </a>
                    </div>
                    <div class="uk-width-1-1@s uk-width-1-2@m uk-width-2-5@l force-right-align image">
                        <img src="{{ asset('assets/images/banner/slider0.jpg') }}" alt="PT. Global Improvement Certification" uk-cover>
                    </div>
                </div>
            </div>
        </li>
        @foreach($slides as $slide)
        <li>
            <div class="content-slider">
                <div class="uk-grid-collapse" uk-grid>
                    <div class="uk-width-expand@m textual-content">
                        <p uk-slider-parallax="y: 110,-110;" class="code-layanan">{{ $slide['text_1'] }}</p>
                        <p uk-slider-parallax="y: 100,-100;" class="name-layanan">{{ $slide['text_2'] }}</p>
                        <p uk-slider-parallax="y: 90,-90;" class="desc-layanan">{{ $slide['text_3'] }}</p>
                        <a href="{{ $slide['link'] }}">
                            <button uk-slider-parallax="y: 80,-80;" class="uk-button uk-button-primary btn-ksm-slider">
                                Lebih Lanjut
                                <span class="pl-5" uk-icon="icon: arrow-right;"></span>
                            </button>
                        </a>
                    </div>
                    <div class="uk-width-1-1@s uk-width-1-2@m uk-width-2-5@l force-right-align image">
                        <img src="{{  asset($slide['image']) }}" alt="{{ $slide['text_1'] }}" uk-cover>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="control-slideshow-container">
        <a class="uk-position-center-left uk-position-small navy-btn" href="#" uk-slideshow-item="previous" uk-icon="icon: arrow-left; ratio: 2"></a>
        <a class="uk-position-center-right uk-position-small navy-btn" href="#" uk-slideshow-item="next" uk-icon="icon: arrow-right; ratio: 2"></a>
    </div>
</div>
<!-- end banner -->

<!-- about us -->
<div id="about-us" uk-scrollspy="cls: uk-animation-fade; delay: 300">
    <div class="uk-container">
        <div class="about-card">
            <div class="uk-grid-collapse uk-grid-match" uk-grid>
                <div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l left-bg">
                    <div>
                        <p class="head">Mengapa Kami Layak Menjadi Mitra Sertifikasi Anda</p>
                    </div>
                </div>
                <div class="uk-width-expand@m right-bg">
                    <div>
                        <p class="description margin-responsive uk-text-justify">
                            <strong>PT Global Improvement Certification (GIC)</strong> merupakan lembaga sertifikasi untuk sistem manajemen internasional (ISO) yang telah menerapkan persyaratan SNI ISO/IEC 17021-1:2015. Berdirinya PT Global Improvement Certification (GIC) untuk meningkatkan standar kualitas dan integritas, sebagai penyedia jasa sertifikasi ISO yang berkomitmen membantu organisasi mencapai dan mempertahankan sertifikasi standar internasional.
                        </p>
                        <a href="{{ url('tentang-kami') }}">
                            <button class="uk-button uk-button-primary btn-about-more">
                                Tentang Kami
                                <span class="pl-5" uk-icon="icon: arrow-right;"></span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="uk-grid-medium" uk-grid>
                <div class="uk-width-1-2@m uk-width-1-4@l">
                    <div class="card-reasons">
                        <p>Pelayanan independen dan kompeten</p>
                        <img src="{{ asset('assets/images/base/why-1.png') }}" alt="alasan-1">
                    </div>
                </div>
                <div class="uk-width-1-2@m uk-width-1-4@l">
                    <div class="card-reasons">
                        <p>Sertifikasi terbaik, cepat, dan akurat</p>
                        <img src="{{ asset('assets/images/base/why-2.png') }}" alt="alasan-2">
                    </div>
                </div>
                <div class="uk-width-1-2@m uk-width-1-4@l">
                    <div class="card-reasons">
                        <p>Sumber daya kompeten dan berpengalaman</p>
                        <img src="{{ asset('assets/images/base/why-3.png') }}" alt="alasan-3">
                    </div>
                </div>
                <div class="uk-width-1-2@m uk-width-1-4@l">
                    <div class="card-reasons">
                        <p>Memberikan solusi tepat dan akurat</p>
                        <img src="{{ asset('assets/images/base/why-4.png') }}" alt="alasan-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end about us -->

<!-- layanan -->
<div id="layanan" class="pad-layanan" style="background-color: transparent;background-image: none;" uk-scrollspy="cls: uk-animation-fade; delay: 300">
    <div class="uk-container">
        <div class="title-section">
            <p class="global-title">Layanan Sertifikasi ISO (International Organization of Standardization)</p>
            <div class="slider-controller">
                <button class="flicking-nav-button prev">
                    <span uk-icon="icon: arrow-left; ratio: 1"></span>
                </button>
                <button class="flicking-nav-button next">
                    <span uk-icon="icon: arrow-right; ratio: 1"></span>
                </button>
            </div>
        </div>
    </div>
    <div>
        <div id="services" class="flicking-viewport">
            <div class="flicking-camera">
                @foreach($slides as $slide)
                <div class="panel service-card">
                    <a href="{{ $slide['link'] }}" draggable="false">
                        <div class="top">
                            <p class="sub-title">{{ $slide['text_1'] }}</p>
                            <p class="title">{{ $slide['text_2'] }}</p>
                        </div>
                        <div class="uk-cover-container uk-transition-toggle featured-image">
                            <img src="{{ asset($slide['image']) }}" alt="{{ $slide['text_1'] }}" uk-cover draggable="false">
                            <canvas width="100%" height="200"></canvas>
                        </div>
                        <div class="bottom">
                            <p class="note">*klik card ini untuk melihat detail dari layanan sertifikasi</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- end of layanan -->

<!-- klien kami -->
<div id="klien-kami" class="uk-container-expand" uk-scrollspy="cls: uk-animation-fade; delay: 300">
    <div class="uk-container">
        <div class="title-section">
            <p class="global-title">Klien Kami</p>
        </div>
        <div class="logo-card">
            <div class="logo-client">
                <img src="{{ asset('assets/images/clients/01. PT Prada Tanjung Burang.jpg') }}" alt="PT Prada Tanjung Burang">
            </div>
            <div class="logo-client">
                <img src="{{ asset('assets/images/clients/02. PT EKA MEGA CIPTA.jpeg') }}" alt="PT EKA MEGA CIPTA">
            </div>
            <div class="logo-client">
                <img src="{{ asset('assets/images/clients/03. PT Jago Elfah Anugrah.png') }}" alt="PT Jago Elfah Anugrah">
            </div>
            <div class="logo-client">
                <img src="{{ asset('assets/images/clients/04. PT Tuah Naga Sakti.jpg') }}" alt="PT Tuah Naga Sakti">
            </div>
        </div>
    </div>
</div>
<!-- end of klien kami -->

<!-- keabsahan sertifikasi -->
<div id="absah-sertif" class="uk-container-expand" uk-scrollspy="cls: uk-animation-fade; delay: 300">
    <div class="uk-container">
        <div class="title-section">
            <p class="global-title">Keabsahan Sertifikasi</p>
            <div class="icon-check">
                <img src="{{ asset('assets/images/base/approve.png') }}" alt="Keabsahan Sertifikasi">
            </div>
        </div>
        <div class="uk-grid-collapse uk-grid-match bottom-spacing" uk-grid>
            <div class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l">
                <div>
                    <p class="description">Dengan <strong>men-<i>scan</i> barcode</strong> yang tertera di sertifikat : </p>
                    <ul class="uk-list uk-list-disc custom-list">
                        <li>Buka <strong>aplikasi camera/barcode scanner</strong> di smartphone anda</li>
                        <li>Setelah itu <strong>scan barcode</strong> yang tertera di sertifikat</li>
                        <li><strong>Open link</strong></li>
                    </ul>
                </div>
            </div>
            <div class="uk-width-expand@m">
                <p class="description top-spacing">Dengan verifikasi menggunakan Nomor Sertifikat pada website : </p>
                <ul class="uk-list uk-list-disc custom-list">
                    <li>Buka website <strong>www.certificationimprovement.com</strong></li>
                    <li>Klik menu <strong>Direktori</strong></li>
                    <li>Masukkan <strong>Nomor Sertifikat</strong></li>
                    <li>Klik tombol <strong>Verifikasi</strong></li>
                </ul>
            </div>
        </div>
        <div id="note" class="bottom-spacing">
            <p class="description">- Untuk mendapatkan nomor sertifikat silahkan hubungi: <strong><a target="_blank" href="{{ url('kontak') }}">kontak kami</a></strong>.</p>
            <p class="mt-0 description">- Untuk verifikasi via barcode silahkan scan barcode dengan aplikasi kamera smartphone. Jika aplikasi kamera tidak mendukung silahkan download aplikasi barcode scanner untuk android dan ios.</p>
        </div>
    </div>
</div>
<!-- end of keabsahan sertifikasi -->

<!-- berita -->
@if($articles && count($articles) > 0 && !empty($articles[0]['categories']) && !empty($articles[0]['image']['name']))
<div id="berita" uk-scrollspy="cls: uk-animation-fade; delay: 300">
    <div class="uk-container">
        <div class="global-title">
            <div class="uk-flex uk-flex-between uk-flex-middle">
                <p class="global-title" style="padding: 0px !important;">Berita Terbaru</p>
                <a href="{{ url('berita') }}">
                    <button class="uk-button uk-button-primary btn-ksm">Semua Berita</button>
                </a>
            </div>
        </div>
        <div class="uk-child-width-1-2@s uk-child-width-1-3@m grid-berita uk-grid-large" uk-grid>
            @foreach($articles as $article)
            <?php
            $gambar = $article['image']['name'] ?? null;
            $gambar = $gambar ? asset('images/articles/600/' . $gambar) : '';
            $categories = $article['categories']
            ?>
            <div class="translated">
                <a href="{{ url('berita/'.$article['link']['link']) }}">
                    <div class="uk-card uk-card-small card-berita">
                        <div class="uk-card-media-top">
                            <div class="uk-cover-container image-height">
                                <img src="{{ $gambar }}" alt="image berita" uk-cover>
                            </div>
                        </div>
                        <div class="uk-card-body text-container">
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
                            <p class="code-berita">{{ $article['title'] }}</p>
                            <div class="module line-clamp">
                                <p class="desc-berita">{{ substr(strip_tags($article['content']), 0, 120) }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- end of berita -->
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

@push('page-script')
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        const container = document.querySelector("#layanan > .uk-container > .title-section");

        if (!container) {
            return;
        }

        function calculateMargins() {
            const containerWidth = container.offsetWidth;
            const windowWidth = window.innerWidth;
            const margin = (windowWidth - containerWidth) / 2;

            if (windowWidth > 640) {
                return margin - 6;
            } else {
                return margin;
            }
        }

        function updateNavButtons(flicking) {
            const prevButton = document.querySelector(".flicking-nav-button.prev");
            const nextButton = document.querySelector(".flicking-nav-button.next");

            const firstPanel = flicking.getPanel(0);
            const lastPanel = flicking.panels[flicking.panels.length - 1];

            if (flicking.camera.position <= firstPanel.position) {
                prevButton.setAttribute("disabled", "true");
            } else {
                prevButton.removeAttribute("disabled");
            }

            if (flicking.camera.position >= lastPanel.position) {
                nextButton.setAttribute("disabled", "true");
            } else {
                nextButton.removeAttribute("disabled");
            }
        }

        function initializeFlicking() {
            const margin = calculateMargins();

            const flicking = new Flicking("#services", {
                defaultIndex: 0,
                bound: false,
                align: {
                    camera: `${margin}px`,
                    panel: "0px"
                },
                inputType: ["touch", "mouse"],
                moveType: ["strict", {
                    count: 1
                }],
            });

            const prevButton = document.querySelector(".flicking-nav-button.prev");
            const nextButton = document.querySelector(".flicking-nav-button.next");

            prevButton.addEventListener("click", () => flicking.prev());
            nextButton.addEventListener("click", () => flicking.next());

            updateNavButtons(flicking);

            flicking.on("moveEnd", () => updateNavButtons(flicking));

            return flicking;
        }

        let flicking = initializeFlicking();

        window.addEventListener("resize", function() {
            flicking.destroy();
            flicking = initializeFlicking();
        });
    });
</script>
@endpush