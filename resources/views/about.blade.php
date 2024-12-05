@extends('layout')
@section('content')
    <div id="tentang-kami" class="uk-container-expand bg-mandala-container" uk-scrollspy="cls: uk-animation-fade; delay: 300">
        <div class="uk-container" uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 500">
            <!-- tabs -->
            <ul class="uk-flex-left" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium" uk-tab>
                <li class="tabs-title"><a href="#">Tentang Kami</a></li>
                <li class="tabs-title"><a href="#">Visi & Misi</a></li>
                <li class="tabs-title"><a href="#">Struktur Organisasi</a></li>
                <li class="tabs-title"><a href="#">Komitmen</a></li>
                <li class="tabs-title"><a href="#">Mekanisme Penggunaan Logo</a></li>
            </ul>
            <!-- tab content -->
            <ul class="uk-switcher uk-margin content-container" uk-scrollspy="cls: uk-animation-slide-left-medium; delay: 900">
                <li>
                    <!-- tentang kami -->
                    <div class="uk-container">
                        <p class="description"><strong>PT Global Improvement Certification (GIC)</strong> merupakan lembaga sertifikasi yang berfokus pada sistem manajemen internasional (ISO) dan telah menerapkan persyaratan SNI ISO/IEC 17021-1:2015. Komitmen kami adalah membantu organisasi di berbagai sektor untuk meningkatkan standar kualitas, integritas, dan kredibilitas mereka melalui proses sertifikasi yang memenuhi standar global.</p>
                        <p class="description">Berdirinya PT Global Improvement Certification (GIC) dilatarbelakangi oleh kebutuhan industri di Indonesia akan lembaga sertifikasi yang berkompeten dan terpercaya. Kami memahami bahwa sertifikasi ISO memainkan peran penting dalam meningkatkan daya saing dan membangun kepercayaan di pasar internasional, sehingga kami hadir untuk menjembatani kebutuhan ini bagi organisasi di Indonesia.</p>
                        <p class="description">Sebagai penyedia jasa sertifikasi ISO, PT Global Improvement Certification (GIC) berkomitmen memberikan jasa audit kepada organisasi demi mempertahankan sertifikasi standar internasionalnya. Kami ingin menjadi mitra dalam memastikan penerapan standar tersebut memberikan manfaat nyata bagi Organisasi tentu dengan Batasan-Batasan ketidakberpihakan kami sebagai lembaga sertifikasi.</p>
                        <p class="description">Didukung oleh sumber daya manusia yang kompeten dan berpengalaman, kami di PT Global Improvement Certification (GIC) siap memberikan pelayanan yang profesional dan terukur. Setiap auditor kami memiliki keahlian khusus dalam standar ISO, serta pemahaman mendalam tentang berbagai industri, sehingga mereka mampu membantu organisasi kami mencapai keunggulan operasional melalui proses sertifikasi yang efektif dan efisien.</p>
                        <p class="description">Sesuai dengan kebutuhan industri, PT Global Improvement Certification (GIC) menawarkan layanan sertifikasi yang beragam, termasuk ISO 9001 untuk Sistem Manajemen Mutu, ISO 37001 untuk Sistem Manajemen Anti Penyuapan, dan standar-standar lainnya yang relevan untuk setiap bidang usaha. Kami berusaha untuk selalu memberikan layanan yang disesuaikan dengan kebutuhan spesifik dari setiap organisasi yang kami layani.</p>
                        <p class="description">Di GIC, kami memahami bahwa setiap organisasi memiliki tantangan unik dan proses yang berbeda. Oleh karena itu, kami berkomitmen untuk memberikan solusi sertifikasi yang dapat diimplementasikan secara praktis dan disesuaikan dengan konteks bisnis masing-masing organisasi kami. Melalui pendekatan ini, kami memastikan bahwa setiap sertifikasi yang kami berikan membawa dampak positif bagi operasional dan pengembangan organisasi.</p>
                        <p class="description">PT Global Improvement Certification (GIC) percaya bahwa proses sertifikasi yang akurat, transparan, dan independen merupakan kunci untuk menciptakan lingkungan bisnis yang lebih kompetitif dan bermartabat. Kami hadir untuk membantu organisasi Anda dalam perjalanan menuju sertifikasi ISO dan mencapai kesuksesan yang berkelanjutan.</p>
                        <div id="visi-misi">
                            <h3 style="font-size: 22px;padding-bottom: 0px;">Layanan sertifikasi kami :</h3>
                            <ul class="uk-list uk-list-disc custom-list">
                                <li><a href="{{ url('layanan/iso-9001-2015-sistem-manajemen-mutu') }}">ISO 9001:2015 - Sistem Manajemen Mutu</a></li>
                                <li><a href="{{ url('layanan/iso-14001-2015-sistem-manajemen-lingkungan') }}">ISO 14001:2015 - Sistem Manajemen Lingkungan</a></li>
                                <li><a href="{{ url('layanan/iso-45001-2018-sistem-manajemen-kesehatan-keselamatan-kerja') }}">ISO 45001:2018 - Sistem Manajemen Kesehatan dan Keselamatan Kerja</a></li>
                                <li><a href="{{ url('layanan/iso-37001-2016-sistem-manajemen-anti-penyuapan') }}">ISO 37001:2016 - Sistem Manajemen Anti Penyuapan</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end of tentang kami -->
                </li>
                <li>
                    <!-- visi & misi -->
                    <div class="uk-container">
                        <div id="visi-misi">
                            <h3>Visi :</h3>
                            <p class="visi description">Menjadi lembaga sertifikasi terdepan dan terpercaya di tingkat nasional maupun internasional, yang berkontribusi pada peningkatan standar mutu dan integritas di berbagai sektor industri.</p>
                            <h3>Misi :</h3>
                            <p class="visi description">Memberikan pelayanan penilaian kesesuaian yang berkualitas, objektif, transparan, integritas dan professional serta mendukung peningkatan kompetensi dan kesadaran organisasi dalam memenuhi standar kualitas dan keberlanjutan.</p>
                        </div>
                    </div>
                    <!-- end of visi & misi -->
                </li>
                <li>
                    <!-- struktur organisasi -->
                    <div class="uk-container">
                        <div id="visi-misi" class="uk-text-center">
                            <img src="{{ asset('assets/images/base/struktur-organisasi.png') }}" style="max-width: 850px;width: 100%" alt="struktur-organisasi">
                        </div>
                    </div>
                    <!-- end of struktur organisasi -->
                </li>
                <li>
                    <!-- ketidakberpihakan -->
                    <div class="uk-container">
                        <ul id="keterangan" uk-accordion="multiple: true">
                            <li class="uk-open">
                                <a class="uk-accordion-title" href="#">Ketidakberpihakan:</a>
                                <div class="uk-accordion-content">
                                    <p class="description">Segenap personal PT Global Improvement Certification (GIC) akan menyatakan setiap ancaman dari ketidakberpihakan yang termasuk :</p>
                                    <ul class="uk-list uk-list-disc">
                                        <li><strong>Kepentingan diri sendiri</strong>, yang berarti bahwa personel PT Global Improvement Certification (GIC) tidak akan bertindak atas nama dan tujuan sendiri atau untuk mendapatkan keuntungan keuangan.</li>
                                        <li><strong>Ancaman ulasan diri</strong>, yang berarti bahwa personel PT Global Improvement Certification (GIC) tidak akan mengaudit organisasi yang telah dikonsultankan sendiri atau menjadi internal auditor di organisasi tersebut dalam kurun waktu min 2 tahun.</li>
                                        <li><strong>Ancaman kepercayaan atau hubungan kedekatan</strong>, yang berarti bahwa personel PT Global Improvement Certification (GIC) tidak diperbolehkan dalam kedekatan emosional atau hubungan kekeluargaan dengan organisasi/auditee.</li>
                                        <li><strong>Ancaman intimidasi</strong>, yang berarti bahwa personel PT Global Improvement Certification (GIC) apabila mendapatkan tekanan atau paksaan, oleh individu atau organisasi, harus melaporkan hal tersebut kepada PT Global Improvement Certification (GIC) dalam menangani hal tersebut.</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="uk-open">
                                <a class="uk-accordion-title" href="#">Kerahasiaan:</a>
                                <div class="uk-accordion-content">
                                    <p class="description">PT Global Improvement Certification (GIC) wajib menjaga informasi klien yang diperoleh dari pelaksanaan kegiatan sertifikasi dan tidak akan memberikan informasi apa pun tentang klien kepada pihak ketiga, kecuali dipersyaratkan dalam peraturan tertulis.</p>
                                    <p class="description">Semua informasi yang tidak boleh dipublikasi harus dijadikan sebagai kerahasiaan. Informasi tentang klien dari sumber selain klien harus dijadikan sebagai kerahasiaan, yang mana konsisten dengan kebijakan PT Global Improvement Certification (GIC).</p>
                                    <p class="description">PT Global Improvement Certification (GIC) paham untuk menjaga kerahasiaan setiap informasi dipersyaratkan.</p>
                                    <p class="description">Dokumen beserta informasi milik klien hanya dapat diakses oleh Personel yang memiliki kewenangan dan hak untuk mengakses. Pihak yang bukan merupakan bagian dari PT Global Improvement Certification (GIC) tidak dapat mengakses dokumen beserta informasi milik klien PT Global Improvement Certification (GIC).</p>
                                </div>
                            </li>
                            <li class="uk-open">
                                <a class="uk-accordion-title" href="#">Kebijakan Perusahaan:</a>
                                <div class="uk-accordion-content">
                                    <ul class="uk-list uk-list-disc">
                                        <li>PT Global Improvement Certification berkomitmen untuk memberikan layanan sertifikasi yang berkualitas, objektif, dan profesional.</li>
                                        <li>PT Global Improvement Certification memastikan setiap proses audit dan penilaian dilakukan secara transparan dan akuntabel, dengan memberikan informasi yang jelas dan dapat dipertanggungjawabkan kepada organisasi.</li>
                                        <li>PT Global Improvement Certification membantu organisasi dalam meningkatkan efektivitas sistem manajemen mereka melalui layanan sertifikasi yang komprehensif dan sesuai dengan kebutuhan bisnis.</li>
                                        <li>PT Global Improvement Certification selalu mematuhi regulasi dan standar yang berlaku. PT Global Improvement Certification mengikuti pedoman yang ditetapkan oleh lembaga terkait untuk menjaga kredibilitas dan integritas setiap proses sertifikasi yang kami lakukan.</li>
                                        <li>PT Global Improvement Certification memprioritaskan integritas dalam seluruh kegiatan bisnis. Tidak ada toleransi terhadap konflik kepentingan, dan kami memastikan setiap tindakan yang diambil oleh tim auditor kami didasarkan pada prinsip kejujuran dan profesionalisme.</li>
                                        <li>PT Global Improvement Certification berkomitmen untuk terus berinovasi dalam menyediakan layanan sertifikasi, termasuk dalam pengembangan teknologi yang mempermudah proses sertifikasi dan audit.</li>
                                        <li>PT Global Improvement Certification melarang dan tidak mentoleransi segala bentuk penyuapan dalam seluruh kegiatan organisasi. Kami berkomitmen untuk mencegah, mendeteksi, dan menangani segala tindakan yang bertentangan dengan prinsip anti-penyuapan, guna menjaga integritas dan kepercayaan dalam layanan kami.</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="uk-open">
                                <a class="uk-accordion-title" href="#">Anti Penyuapan:</a>
                                <div class="uk-accordion-content">
                                    <p class="description">Setiap Personel PT Global Improvement Certification menyatakan untuk mematuhi kebijkan anti penyuapan yang berlaku di Republik Indonesia. Tidak menerima gratifikasi dari klien, pihak lain yang terkait dengan proses sertifikasi PT Global Improvement Certification. Pemberian hadiah oleh PT Global Improvement Certification tidak akan mempengaruhi hasil proses sertifikasi yang dilakukan</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- end of ketidakberpihakan -->
                </li>
                <li>
                    <!-- penggunaan logo -->
                    <div class="uk-container">
                        <div id="visi-misi">
                            <h3 style="font-size: 22px;">Penggunaan Logo Sertifikasi PT Global Improvement Certification (GIC)</h3>
                            <div id="ketidakberpihakan" class="pt-15">
                                <ul class="uk-list uk-list-disc custom-list">
                                    <li>Organisasi yang disertifikasi oleh PT Global Improvement Certification (GIC) dapat mencantumkan logo sertifikasi pada dokumen resmi dan bahan relevan, seperti kop surat, laporan, dan brosur, sesuai standar dan ruang lingkup sertifikasi.</li>
                                    <li>Logo dapat digunakan pada bahan publikasi dengan memenuhi ketentuan yang berlaku.</li>
                                    <li>Pernyataan "disertifikasi oleh GIC" dapat digunakan selama sesuai dengan ruang lingkup sertifikasi yang berlaku.</li>
                                    <li>Logo tidak boleh dicantumkan pada produk, kemasan, atau laporan uji dan kalibrasi yang diperjualbelikan.</li>
                                    <li>Logo tidak boleh digunakan pada kemasan produk; gantikan dengan pernyataan seperti "tersertifikasi ISO 9001:2015 oleh PT Global Improvement Certification (GIC)".</li>
                                </ul>
                            </div>
                            <h3 style="font-size: 22px;">Ketentuan Lain Dalam Menggunakan Logo Sertifikasi PT Global Improement Certification (GIC) </h3>
                            <div id="ketidakberpihakan" class="pt-15">
                                <ul class="uk-list uk-list-disc custom-list">
                                    <li>Logo atau pernyataan “disertifikasi/tersertifikasi oleh PT Global Improvement Certification (GIC)” tidak boleh digunakan untuk menyiratkan bahwa GIC bertanggung jawab atas penyalahgunaan atau penafsiran yang timbul dari penggunaannya.</li>
                                    <li>Jika sertifikasi dibekukan, organisasi yang bersangkutan tidak boleh menggunakan sertifikasi atas nama GIC untuk tujuan promosi lebih lanjut.</li>
                                    <li>Organisasi yang sertifikasinya berakhir dan tidak diperpanjang harus segera menghentikan penggunaan logo atau pernyataan “disertifikasi oleh PT Global Improvement Certification (GIC)” dalam promosi.</li>
                                    <li class="dot-top">
                                        <div>
                                            <p style="font-size: 15px;">Logo PT Global Improvement Certification (GIC) yang benar adalah :</p>
                                            <ul class="uk-list uk-list-numeric custom-list small">
                                                <li class="dot-top">
                                                    <div>
                                                        <p class="description" style="font-size: 15px;">Logo Perusahaan </p>
                                                        <img src="{{ asset('assets/images/base/penggunaan-logo.png') }}" class="max-w-210" alt="Logo GIC">
                                                    </div>
                                                </li>
                                                <li class="dot-top">
                                                    <div>
                                                        <p class="description" style="font-size: 15px;">Logo Sertifikasi standar ISO 9001:2015 </p>
                                                        <img src="{{ asset('assets/images/base/penggunaan-logo-9001.png') }}" class="max-w-200" alt="Logo GIC 9001">
                                                    </div>
                                                </li>
                                                <li class="dot-top">
                                                    <div>
                                                        <p class="description" style="font-size: 15px;">Logo Sertifikasi standar ISO 14001:2015 </p>
                                                        <img src="{{ asset('assets/images/base/penggunaan-logo-14001.png') }}" class="max-w-200" alt="Logo GIC 14001">
                                                    </div>
                                                </li>
                                                <li class="dot-top">
                                                    <div>
                                                        <p class="description" style="font-size: 15px;">Logo Sertifikasi standar ISO 45001:2018 </p>
                                                        <img src="{{ asset('assets/images/base/penggunaan-logo-45001.png') }}" class="max-w-200" alt="Logo GIC 45001">
                                                    </div>
                                                </li>
                                                <li class="dot-top">
                                                    <div>
                                                        <p class="description" style="font-size: 15px;">Logo Sertifikasi standar ISO 37001:2016 </p>
                                                        <img src="{{ asset('assets/images/base/penggunaan-logo-37001.png') }}" class="max-w-200" alt="Logo GIC 37001">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>Penggunaan Logo Sertifikasi PT Global Improvement Certification (GIC) harus memenuhi ketentuan di atas.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end of penggunaan logo -->
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
