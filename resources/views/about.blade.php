@extends('layout')
@section('content')
    <div class="uk-container-expand bg-mandala-container" uk-scrollspy="cls: uk-animation-fade; delay: 300">
        <div class="uk-container" uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 500">
            <!-- tabs -->
            <ul class="uk-flex-left" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium" uk-tab>
                <li class="tabs-title"><a href="#">Tentang Kami</a></li>
                <li class="tabs-title"><a href="#">Visi & Misi</a></li>
                <li class="tabs-title"><a href="#">Struktur Organisasi</a></li>
                <li class="tabs-title"><a href="#">Ketidakberpihakan</a></li>
            </ul>
            <!-- tab content -->
            <ul class="uk-switcher uk-margin" uk-scrollspy="cls: uk-animation-slide-left-medium; delay: 900">
                <li>
                    <!-- tentang kami -->
                    <div class="uk-container uk-container-small-x pt-35">
                        <p class="description"><strong>Global Improvement Certification</strong> merupakan <strong>lembaga penilaian kesesuaian untuk sistem manajemen internasional (ISO)</strong>. Berdirinya Global Improvement Certification berawal dari komitmen dan kesadaran pentingnya penerapan sistem manajemen pada suatu organisasi/perusahaan, sehingga mendorong <strong>Global Improvement Certification</strong> untuk membantu melakukan penilaian kesesuaian sistem manajemen yang didukung oleh sumber daya manusia yang professional, berkompeten, dan berpengalaman di bidang sistem manajemen.</p>
                        <p class="description">Dalam proses penilaian kesesuaian <strong>Global Improvement Certification</strong> telah menerapkan dan memelihara <strong>ISO/IEC 17021-1:2015</strong> sebagai standar lembaga penilai kesesuaian untuk memastikan bahwa <strong>Global Improvement Certification</strong> tidak memihak dan memberikan hasil yang konsisten.</p>
                        <p class="description">Penilaian kesesuaian yang dilakukan oleh <strong>Global Improvement Certification ISO 17021</strong> dengan harapan memberikan nilai tambah bagi perusahaan, bagi pelanggan, dan bagi pihak berkepentingan lainnya dengan meyakinkan bahwa nilai sertifikat yang dikeluarkan akan diakui oleh semua pihak.</p>
                        <p class="description"><strong>ISO/IEC 17021</strong> berisi prinsip dan persyaratan untuk kompetensi, konsistensi, dan ketidakberpihakan audit dan sertifikasi sistem manajemen dari semua jenis sistem manajemen dan badan-badan lain yang menyediakan kegiatan ini.</p>
                        <p class="description">Tujuan menerapkan standar <strong>ISO 17021</strong> ini adalah agar <strong>Global Improvement Certification</strong> memiliki tanggungjawab kepada pihak yang berkepentingan, termasuk kepada klien mereka dan pelanggan organisasi yang memiliki sistem manajemen bersertifikat untuk memastikan bahwa hanya auditor berkompetensi relevan yang diizinkan untuk melakukan audit. Maksudnya adalah semua auditor dan personil lain yang terlibat dalam fungsi sertifikasi memiliki kompetensi sama seperti yang disyaratkan dalam <strong>ISO/IEC 17021</strong>.</p>
                    </div>
                    <!-- end of tentang kami -->
                </li>
                <li>
                    <!-- visi & misi -->
                    <div class="uk-container uk-container-small-x">
                        <div id="visi-misi" class="pt-35">
                            <h3>Visi :</h3>
                            <p class="visi description"><strong>PT. Global Improvement Certification</strong> ingin menjadi lembaga penilaian kesesuaian <strong>terdepan dan nomor 1 (satu) di indonesia</strong> dengan memberikan kualitas pelayanan penilaian kesesuaian sistem manajemen yang profesional, kompeten dan berpengalaman.</p>
                            <h3>Misi :</h3>
                            <ul class="uk-list uk-list-disc">
                                <li>Menerapkan, memelihara dan mengembangkan sistem sesuai ISO/IEC 17021.1:2015 sebagai acuan lembaga penilaian kesesuaian.</li>
                                <li>Menyediakan sumber daya manusia yang profesional, berkompeten dan berpengalaman dibidangnya.</li>
                                <li>Memahami kebutuhan pelanggan demi memberikan hasil yang terbaik, optimal, terpercaya dan dapat memberikan nilai tambah terhadap pelanggan.</li>
                                <li>Berkomitmen memberikan layanan standarisasi bertaraf internasional untuk segala jenis organisasi atau perusahaan.</li>
                            </ul>
                        </div>
                    </div>
                    <!-- end of visi & misi -->
                </li>
                <li>
                    <!-- struktur organisasi -->
                    <div class="uk-container uk-container-small-x">
                        <div id="visi-misi" class="pt-35">
                            <img src="{{ asset('assets/images/base/struktur-organisasi.png') }}" class="pt-15" alt="struktur-organisasi">
                        </div>
                    </div>
                    <!-- end of struktur organisasi -->
                </li>
                <li>
                    <!-- ketidakberpihakan -->
                    <div class="uk-container uk-container-small-x">
                        <div id="visi-misi" class="pt-35">
                            <p class="description"><strong>Komitmen ketidak berpihakan</strong></p>
                            <div id="ketidakberpihakan" class="pt-15">
                                <p class="description">Top <strong>KSManajemen berkomitmen terhadap ketidakberpihakan dalam kegiatan sertifikasi</strong>. Pernyataan yang yang menunjukkan ketidakberpihakan dalam melaksanakan kegiatan sertifikasi sistem manajemen, mengelola konflik kepentingan, dan menjamin objektivitas kegiatan sertifikasi sistem manajemen dapat diakses publik melalui publikasi.</p>
                                <ul class="uk-list uk-list-decimal">
                                    <li>KSManajemen mengidentifikasi, menganalisis, mendokumentasikan, dan memperagakan cara mengeliminasi atau memperkecil ancaman konflik kepentingan yang timbul dari ketentuan sertifikasi termasuk setiap konflik yang timbul dari hubungan kerja atau semua sumber konflik kepentingan baik dari pihak internal maupun eksternal.</li>
                                    <li>KSManajemen tidak dapat memberikan sertifikasi jika terjadi suatu hubungan yang menimbulkan ancaman ketidakberpihakan.</li>
                                    <li>KSManajemen tidak mensertifikasi suatu lembaga yang bergerak di bidang sertifikasi sistem manajemen.</li>
                                    <li>KSManajemen tidak menawarkan atau menyediakan konsultasi sistem manajemen.</li>
                                    <li>KSManajemen tidak menawarkan atau menyediakan audit internal Klien yang disertifikasinya.</li>
                                    <li>KSManajemen tidak mensertifikasi sistem manajemen pada pelanggan yang telah menerima konsultasi sistem manajemen atau audit internal, dimana hubungan antara organisasi konsultan dengan KSManajemen menunjukkan ancaman yang mempengaruhi ketidakberpihakkan KSManajemen.</li>
                                    <li>KSManajemen tidak memberikan subkontrak Jasa Audit pada organisasi konsultan Sistem Manajemen.</li>
                                    <li>Penawaran atau pemasaran jasa sertifikasi KSManajemen memiliki beberapa peraturan untuk menghindari ancaman ketidakberpihakan, berikut adalah peraturan yang ditetapkan oleh KSManajemen terhadap proses pemasaran jasa sertifikasi.</li>
                                    <li>Kegiatan/jasa sertifikasi KSManajemen tidak ditawarkan atau dipasarkan secara bersamaan dengan kegiatan/konsultasi sistem manajemen.</li>
                                    <li>KSManajemen akan mengambil tindakan untuk memperbaiki klaim yang tidak sesuai dari setiap organisasi konsultan yang menyatakan atau menunjukkan bahwa sertifikasi akan lebih sederhana, lebih mudah, lebih cepat atau lebih murah jika menggunakan KSManajemen.</li>
                                    <li>KSManajemen tidak menyatakan atau menunjukkan bahwa sertifikasi akan lebih sederhana, lebih mudah, lebih cepat atau lebih murah jika organisasi konsultan tertentu digunakan.</li>
                                    <li>Untuk menjamin tidak ada konflik kepentingan, personel yang telah memberikan atau terlibat dalam kegiatan konsultasi sistem manajemen dalam dua tahun berakhirnya konsultasi termasuk mereka yang bertindak dalam kapasitas manajerial tidak boleh berperan serta dalam audit atau kegiatan sertifikasi pada klien yang ditangani oleh KSManajemen.</li>
                                    <li>KSManajemen akan mengambil tindakan untuk menanggapi setiap ancaman terhadap ketidakberpihakan yang timbul dari tindakan personel, lembaga atau organisasi lain.</li>
                                    <li>Seluruh Personel KSManajemen (Internal, Eksternal, atau Komite) yang dapat mempengaruhi kegiatan sertifikasi disyaratkan untuk bertindak secara tidak berpihak dan tidak diizinkan memberi tekanan komersial, keuangan atau tekanan lainnya yang mengkompromikan ketidakberpihakan.</li>
                                </ul>
                                <p class="description">Personel KSManajemen mensyaratkan personel (Internal dan eksternal) untuk mengungkapkan seluruh situasi yang mungkin menimbulkan konflik kepentingan pada Personel KSManajemen atau personelnya, dan tidak akan menggunakan personel tersebut, kecuali terbukti tidak terdapat konflik kepentingan. Informasi yang didapat akan dijadikan sebagai masukan pada rapat komite etik dan tinjauan manajemen untuk mengidentifikasi dan cara untuk mengeliminasi atau mengurangi ancaman ketidakberpihakan.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end of ketidakberpihakan -->
                </li>
            </ul>
            <!-- end of tabs -->
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
