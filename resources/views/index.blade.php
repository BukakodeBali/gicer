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
            'image' => 'assets/images/banner/slider4.jpg',
            'text_1' => 'OHSAS 18001:2007',
            'text_2' => 'Sistem Manajemen Kesehatan dan Keselamatan Kerja',
            'text_3' => 'Dengan di sertifikasi OHSAS 18001, berarti organiasi anda telah mendapatkan sertifikasi yang diakui secara global dalam bidang sistem manajemen kesehatan dan keselamatan kerja.',
            'link' => url('layanan/ohsas-18001-2007-sistem-manajemen-kesehatan-keselamatan-kerja'),
            'icon' => 'assets/images/banner/ico4.png'
        ];

        $slides[] = [
            'image' => 'assets/images/banner/slider5.jpg',
            'text_1' => 'ISO 22000:2018',
            'text_2' => 'Sistem Manajemen Keamanan Pangan',
            'text_3' => 'Dengan di sertifikasi ISO 22000, berarti organiasi anda telah mendapatkan sertifikasi yang diakui secara global dalam bidang sistem manajemen keamanan pangan.',
            'link' => url('layanan/iso-22000-2018-sistem-manajemen-keamanan-pangan'),
            'icon' => 'assets/images/banner/ico5.png'
        ];

        $slides[] = [
            'image' => 'assets/images/banner/slider6.jpg',
            'text_1' => 'ISO 50001:2018',
            'text_2' => 'Sistem Manajemen Energi',
            'text_3' => 'Dengan di sertifikasi ISO 50001, berarti organiasi anda telah mendapatkan sertifikasi yang diakui secara global dalam bidang sistem manajemen energi.',
            'link' => url('layanan/iso-50001-2018-sistem-manajemen-energi'),
            'icon' => 'assets/images/banner/ico6.png'
        ];

        $slides[] = [
            'image' => 'assets/images/banner/slider7.jpg',
            'text_1' => 'ISO 27001:2022',
            'text_2' => 'Sistem Manajemen Keamanan Informasi',
            'text_3' => 'Dengan di sertifikasi ISO 27001, berarti organiasi anda telah mendapatkan sertifikasi yang diakui secara global dalam bidang sistem manajemen keamanan informasi.',
            'link' => url('layanan/iso-27001-2022-sistem-manajemen-keamanan-informasi'),
            'icon' => 'assets/images/banner/ico7.png'
        ];

        $slides[] = [
            'image' => 'assets/images/banner/slider8.jpg',
            'text_1' => 'ISO 37001:2016',
            'text_2' => 'Sistem Manajemen Anti Penyuapan',
            'text_3' => 'Dengan di sertifikasi ISO 37001, berarti organiasi anda telah mendapatkan sertifikasi yang diakui secara global dalam bidang sistem manajemen anti penyuapan.',
            'link' => url('layanan/iso-37001-2016-sistem-manajemen-anti-penyuapan'),
            'icon' => 'assets/images/banner/ico8.png'
        ];

        $slides[] = [
            'image' => 'assets/images/banner/slider9.jpg',
            'text_1' => 'ISO 13485:2016',
            'text_2' => 'Sistem Manajemen Peralatan Medis',
            'text_3' => 'Dengan di sertifikasi ISO 13485, berarti organiasi anda telah mendapatkan sertifikasi yang diakui secara global dalam bidang sistem manajemen peralatan medis.',
            'link' => url('layanan/iso-13485-2016-sistem-manajemen-peralatan-medis'),
            'icon' => 'assets/images/banner/ico9.png'
        ];

        $slides[] = [
            'image' => 'assets/images/banner/slider10.jpg',
            'text_1' => 'ISO/TS 16949:2009',
            'text_2' => 'Sistem Manajemen Kualitas Otomotif',
            'text_3' => 'Dengan di sertifikasi ISO/TS 16949, berarti organiasi anda telah mendapatkan sertifikasi yang diakui secara global dalam bidang sistem manajemen kualitas otomotif.',
            'link' => url('layanan/iso-ts-16949-2009-sistem-manajemen-kualitas-otomotif'),
            'icon' => 'assets/images/banner/ico10.png'
        ];
        ?>

        <ul class="uk-slideshow-items">
            <li>
                <div class="content-slider">
                    <div class="uk-grid-collapse" uk-grid>
                        <div class="uk-width-expand@m textual-content">
                            <p uk-slider-parallax="y: 110,-110;" class="code-layanan">Lembaga Sertifikasi</p>
                            <p uk-slider-parallax="y: 100,-100;" class="name-layanan">Sertifikasi ISO Independen Bertaraf Internasional</p>
                            <p uk-slider-parallax="y: 90,-90;" class="desc-layanan">Global Improvement Certification merupakan lembaga penilaian kesesuaian untuk sistem manajemen internasional (ISO). </p>
                            <a href="#">
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
                                <a href="{{ url('tentang-kami') }}">
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
            <a class="uk-position-center-left uk-position-small navy-btn" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
            <a class="uk-position-center-right uk-position-small navy-btn" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
        </div>
    </div>
    <!-- end banner -->

    <!-- about us -->
    <div id="about-us" uk-scrollspy="cls: uk-animation-fade; delay: 200">
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
                            <p class="description margin-responsive">
                                <strong>Global Improvement Certification</strong> merupakan lembaga penilaian kesesuaian untuk sistem manajemen internasional (ISO) yang berdiri atas dasar komitmen dan kesadaran akan pentingnya penerapan sistem manajemen dalam organisasi atau perusahaan. Lembaga ini hadir untuk membantu menilai kesesuaian sistem manajemen melalui dukungan sumber daya manusia yang profesional, berkompeten, dan berpengalaman di bidangnya.
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
    <div id="layanan" class="pad-layanan">
        <div class="uk-container">
            <p class="global-title" uk-scrollspy="cls: uk-animation-fade; delay: 500">Layanan Sertifikasi ISO, OHSAS, dan ISO/TS.</p>
            <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l grid-layanan uk-grid-column-medium uk-grid-row-small" uk-grid uk-scrollspy="cls: uk-animation-scale-up; target: .uk-card; delay: 300;">
                @foreach($slides as $slide)
                    <div class="translated">
                        <a href="{{ $slide['link'] }}">
                            <div class="uk-card uk-card-small card-layanan">
                                <div class="uk-card-media-top">
                                    <div class="uk-cover-container image-height">
                                        <img src="{{ asset($slide['image']) }}" alt="ISO 9001:2015" uk-cover>
                                    </div>
                                </div>
                                <div class="uk-card-body text-container">
                                    <p class="code-layanan">{{ $slide['text_1'] }}</p>
                                    <p class="desc-layanan">{{ $slide['text_2'] }}</p>
                                </div>
                                <div class=" icon-layanan-container uk-card-body">
                                    <img class="float-icon-layanan" src="{{ $slide['icon'] }}" alt="{{ $slide['text_1'] }}">
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end of layanan -->
    <!-- keabsahan sertifikasi -->
    <div id="absah-sertif" class="uk-container-expand">
        <div class="uk-grid-collapse uk-grid-match" uk-grid>
            <div class="uk-width-1-3@m uk-width-2-5@l left-bg rouded-shape-right" uk-scrollspy="cls: uk-animation-fade; delay: 200" style="min-height: 250px;"></div>
            <div class="uk-width-expand@m right-bg" uk-scrollspy="cls: uk-animation-fade; delay: 500">
                <div class="uk-card uk-card-default uk-card-body overlaping-container right">
                    <div class="absah-content">
                        <p class="global-title" uk-scrollspy="cls: uk-animation-fade; delay: 300">Keabsahan Sertifikasi</p>
                        <div uk-scrollspy="cls: uk-animation-fade; delay: 500">
                            <p class="description">Dengan <strong>men-<i>scan</i> barcode</strong> yang tertera di sertifikat : </p>
                            <ul class="uk-list uk-list-disc">
                                <li>Buka <strong>aplikasi camera/barcode scanner</strong> di smartphone anda</li>
                                <li>Setelah itu <strong>scan barcode</strong> yang tertera di sertifikat</li>
                                <li><strong>Open link</strong></li>
                            </ul>
                        </div>
                        <div uk-scrollspy="cls: uk-animation-fade; delay: 700">
                            <p class="description">Dengan login menggunakan ID client dan Password pada website : </p>
                            <ul class="uk-list uk-list-disc">
                                <li>Buka website <strong>www.ksmanajemen.com</strong></li>
                                <li>Klik menu <strong>VERIFIKASI</strong></li>
                                <li>Masukkan <strong>ID client</strong></li>
                                <li>Masukkan <strong>password</strong></li>
                                <li><strong>Login</strong></li>
                            </ul>
                        </div>
                    </div>
                    <div id="note" uk-scrollspy="cls: uk-animation-slide-right-medium; delay: 500">
                        <p class="description inversed">- Untuk mendapatkan id client dan password silahkan hubungi: <strong><a target="_blank" href="{{ url('kontak') }}">kontak kami</a></strong>.</p>
                        <p class="mt-0 description inversed">- Untuk login via barcode silahkan scan barcode dengan aplikasi kamera smartphone. Jika aplikasi kamera tidak mendukung silahkan download aplikasi barcode scanner untuk android dan ios.</p>
                    </div>
                    <div id="note-bg" class="bg-blue"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of keabsahan sertifikasi -->
    <!-- klien kami -->
    <!--<div id="klien-kami" style="background: #f5f5f5;" uk-scrollspy="cls: uk-animation-fade; delay: 600">-->
    <!--    <div class="uk-container">-->
    <!--        <div class="uk-grid-match uk-child-width-expand@s uk-text-center" uk-grid>-->
    <!--            <div class="uk-text-center">-->
    <!--                <div id="number-count" class="container-counter">-->
    <!--                    <p id="number-klien" class="number-count">0</p>-->
    <!--                    <p class="desc">Klien Kami</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="uk-text-center">-->
    <!--                <div class="container-counter">-->
    <!--                    <p id="number-sertif" class="number-count">0</p>-->
    <!--                    <p class="desc">Sertifikat telah di terbitkan</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="bg-map m-h-250"></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- klien kami -->
    <!-- berita -->
    <div id="berita">
        <div class="uk-container">
            <p class="global-title" uk-scrollspy="cls: uk-animation-fade; delay: 300">Berita Terbaru</p>
            <div class="uk-child-width-1-2@s uk-child-width-1-3@m grid-berita uk-grid-large" uk-grid uk-scrollspy="cls: uk-animation-fade; target: .uk-card; delay: 400;">
                @foreach($articles as $article)
                        <?php
                        $gambar = $article['image']['name'] ?? null;
                        $gambar = $gambar ? asset('images/articles/600/'.$gambar) : '';
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
                                    <p class="code-berita">{{ $article['title'] }}</p>
                                    <div class="module line-clamp">
                                        <p class="desc-berita">{{ substr(strip_tags($article['content']), 0, 120) }}</p>
                                    </div>
                                    <table class="berita-info">
                                        <td class="left">
                                            @foreach($categories as $category)
                                                    <?php
                                                    $link = $category['link']['link'] ?? '';
                                                    ?>
                                                <span uk-icon="icon: list; ratio: 0.8"></span> <a href="{{ url('kategori/'.$link) }}">{{ $category['name'] }}</a>
                                            @endforeach
                                        </td>
                                        <td class="right">
                                            <span uk-icon="icon: calendar; ratio: 0.8"></span>
                                            {{ $article['formatted_published_at'] }}
                                        </td>
                                    </table>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="global-title">
                <a href="{{ url('berita') }}">
                    <button class="uk-button uk-button-primary btn-ksm" uk-scrollspy="cls: uk-animation-fade; delay: 600">Semua Berita</button>
                </a>
            </div>
        </div>
    </div>
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
        window.addEventListener("load", function(){
            //custome overlaping background height (solid color only)
            var visi = document.getElementById("bg-blue-height");
            document.getElementById("bg-blue-misi").style.height = visi.offsetHeight+'px';
            var absah = document.getElementById("note");
            document.getElementById("note-bg").style.height = absah.offsetHeight+'px';
            window.addEventListener('resize', function(event) {
                document.getElementById("bg-blue-misi").style.height = visi.offsetHeight+'px';
                document.getElementById("note-bg").style.height = absah.offsetHeight+'px';
            }, true);
        });
        //animate counter script
        // function animate(obj, initVal, lastVal, duration) {

        //     let startTime = null;

        //     //get the current timestamp and assign it to the currentTime variable
        //     let currentTime = Date.now();

        //     //pass the current timestamp to the step function
        //     const step = (currentTime ) => {

        //         //if the start time is null, assign the current time to startTime
        //         if (!startTime) {
        //             startTime = currentTime ;
        //         }

        //         //calculate the value to be used in calculating the number to be displayed
        //         const progress = Math.min((currentTime  - startTime) / duration, 1);

        //         //calculate what to be displayed using the value gotten above
        //         obj.innerHTML = Math.floor(progress * (lastVal - initVal) + initVal);

        //         //checking to make sure the counter does not exceed the last value (lastVal)
        //         if (progress < 1) {
        //             window.requestAnimationFrame(step);
        //         }
        //         else{
        //             window.cancelAnimationFrame(window.requestAnimationFrame(step));
        //         }
        //     };

        //     //start animating
        //     window.requestAnimationFrame(step);
        // }

        // let text1 = document.getElementById('number-klien');
        // let text2 = document.getElementById('number-sertif');

        // const load = () => {
        //     animate(text1, 0, {{ $clientCount }}, 5000);
        //     animate(text2, 0, {{ $certificateCount }}, 5000);
        // }
        //check elemen is visible or not
        // function isInViewport(el) {
        //     const rect = el.getBoundingClientRect();
        //     return (
        //         rect.top >= 0 &&
        //         rect.left >= 0 &&
        //         rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        //         rect.right <= (window.innerWidth || document.documentElement.clientWidth)

        //     );
        // }
        // //to check sroll and if klient kami is on viewport run load animation
        // var numberCount = document.getElementById("number-count");
        // var counter = 0;
        // document.addEventListener('scroll', function () {
        //     if (counter === 0) {
        //         if (isInViewport(numberCount)) {
        //             load();
        //             counter = 1;
        //         }
        //     }
        // }, {
        //     passive: true
        // });
    </script>
@endpush
