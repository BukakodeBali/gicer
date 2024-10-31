@extends('layout')
@section('content')
    <div id="tentang-kami" class="uk-container-expand bg-mandala-container" uk-scrollspy="cls: uk-animation-fade; delay: 300">
        <div class="uk-container" uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 500">
            <!-- tabs -->
            <ul class="uk-flex-left" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium" uk-tab>
                <li class="tabs-title"><a href="#">Tentang Kami</a></li>
                <li class="tabs-title"><a href="#">Visi & Misi</a></li>
                <li class="tabs-title"><a href="#">Struktur Organisasi</a></li>
                <li class="tabs-title"><a href="#">Ketidakberpihakan</a></li>
                <li class="tabs-title"><a href="#">Mekanisme Penggunaan Logo</a></li>
            </ul>
            <!-- tab content -->
            <ul class="uk-switcher uk-margin content-container" uk-scrollspy="cls: uk-animation-slide-left-medium; delay: 900">
                <li>
                    <!-- tentang kami -->
                    <div class="uk-container">
                        <p class="description"><strong>Global Improvement Certification (GIC)</strong> Lembaga sertifikasi independen, yang tidak bekerjasama dengan perusahaan atau organisasi apapun, yang berkedudukan di Jakarta. Lembaga ini bertujuan untuk mendukung penilaian kesesuaian sistem manajemen dengan menyediakan sumber daya manusia yang profesional, kompeten, dan berpengalaman dalam bidangnya.</p>
                        <div id="visi-misi">
                            <h3>Kebijakan :</h3>
                            <ul class="uk-list uk-list-disc custom-list">
                                <li>PT Global Improvement Certification berkomitmen untuk memberikan layanan sertifikasi yang berkualitas, objektif, dan profesional.</li>
                                <li>PT Global Improvement Certification memastikan setiap proses audit dan penilaian dilakukan secara transparan dan akuntabel, dengan memberikan informasi yang jelas dan dapat dipertanggungjawabkan kepada klien.</li>
                                <li>PT Global Improvement Certification membantu organisasi dalam meningkatkan efektivitas sistem manajemen mereka melalui layanan sertifikasi yang komprehensif dan sesuai dengan kebutuhan bisnis.</li>
                                <li>PT Global Improvement Certification selalu mematuhi regulasi dan standar yang berlaku. PT Global Improvement Certification mengikuti pedoman yang ditetapkan oleh lembaga terkait untuk menjaga kredibilitas dan integritas setiap proses sertifikasi yang kami lakukan.</li>
                                <li>PT Global Improvement Certification memprioritaskan integritas dalam seluruh kegiatan bisnis. Tidak ada toleransi terhadap konflik kepentingan, dan kami memastikan setiap tindakan yang diambil oleh tim auditor kami didasarkan pada prinsip kejujuran dan profesionalisme.</li>
                                <li>PT Global Improvement Certification berkomitmen untuk terus berinovasi dalam menyediakan layanan sertifikasi, termasuk dalam pengembangan teknologi yang mempermudah proses sertifikasi dan audit.</li>
                            </ul>
                            <h3>Sasaran :</h3>
                            <ul class="uk-list uk-list-disc custom-list">
                                <li>Meningkatkan Kepuasan Klien: Mencapai tingkat kepuasan klien minimal 90% melalui audit yang objektif, tepat waktu, dan layanan yang responsif.</li>
                                <li>Pengembangan Kompetensi Auditor: Menyediakan pelatihan tahunan bagi auditor untuk memastikan pemahaman mendalam terkait perubahan regulasi ISO 9001 dan ISO 37001, serta peningkatan kemampuan teknis.</li>
                                <li>Peningkatan Jumlah Sertifikasi: Meningkatkan jumlah perusahaan yang tersertifikasi hingga 15% setiap tahun untuk ISO 9001 dan ISO 37001 dengan mempertahankan kualitas proses sertifikasi.</li>
                                <li>Kepatuhan terhadap Standar: Memastikan 100% proses sertifikasi sesuai dengan pedoman ISO/IEC 17021 untuk menjaga akurasi, objektivitas, dan transparansi.</li>
                                <li>Integritas dan Etika: Mengimplementasikan kebijakan “zero tolerance” terhadap konflik kepentingan dan pelanggaran etika dalam proses audit dan sertifikasi, dengan pencapaian 100% kepatuhan.</li>
                                <li>Inovasi Layanan Sertifikasi: Mengembangkan platform digital untuk memfasilitasi proses audit dan sertifikasi yang lebih efisien dan transparan, dengan target implementasi penuh dalam waktu dua tahun.</li>
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
                            <p class="visi description">Menjadi lembaga penilaian kesesuaian terdepan dan terpercaya di tingkat nasional maupun internasional, yang berkontribusi pada peningkatan standar mutu dan integritas di berbagai sektor industry.</p>
                            <h3>Misi :</h3>
                            <p class="visi description">Memberikan pelayanan penilaian kesesuaian yang berkualitas, objektif, transparan, integritas dan professional serta mendukung peningkatan kompetensi dan kesadaran perusahaan dalam memenuhi standar kualitas dan keberlanjutan.</p>
                        </div>
                    </div>
                    <!-- end of visi & misi -->
                </li>
                <li>
                    <!-- struktur organisasi -->
                    <div class="uk-container">
                        <div id="visi-misi" class="uk-text-center">
                            <p class="uk-text-justify description mt-15">Dalam mendukung kegiatan operasional baik sertifikasi dan manajemen, <strong>PT Global Improvement Certification (GIC)</strong> didukung oleh fungsi struktural yang tertera dalam gambar dibawah ini :</p>
                            <img src="{{ asset('assets/images/base/struktur-organisasi.png') }}" class="pt-15" style="max-width: 850px;width: 100%" alt="struktur-organisasi">
                            <p class="uk-text-justify description">Untuk mendukung operasional baik manajemen dan sertifikasi, PT Global Improvement Certification (GIC) didukung oleh :</p>
                            <div class="uk-text-left">
                                <ul id="keterangan" uk-accordion="multiple: true">
                                    <li class="uk-open">
                                        <a class="uk-accordion-title" style="font-size: 16px;" href="#">Fungsi sertifikasi</a>
                                        <div class="uk-accordion-content">
                                            <ul class="uk-list uk-list-disc">
                                                <li>Pengakaji permohonan</li>
                                                <li>Lead auditor</li>
                                                <li>Auditor</li>
                                                <li>Tenaga ahli</li>
                                                <li>Pengkaji laporan</li>
                                                <li>Pengambil keputusan sertifikasi</li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="uk-open">
                                        <a class="uk-accordion-title" style="font-size: 16px;" href="#">Fungsi manajemen</a>
                                        <div class="uk-accordion-content">
                                            <ul class="uk-list uk-list-disc">
                                                <li>Direktur</li>
                                                <li>Chief Executive Officer</li>
                                                <li>Manager Corporate</li>
                                                <li>Manager Development</li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <div class="pb-15">
                                    <p class="uk-text-justify description">Tugas dan tanggung jawab telah ditetapkan untuk masing-masing fungsi dalam mendukung operasional PT Global Improvement Certification (GIC), adapun tugas tersebut meliputi :</p>
                                </div>
                                <div id="ketidakberpihakan">
                                    <ul class="uk-list uk-list-disc custom-list">
                                        <li>Mekanisme menjaga <strong>ketidakberpihakan</strong> dilakukan dengan mengundang <strong>stakeholder</strong></li>
                                        <li>Kajian permohonan dilakukan oleh <strong>Manager Technical</strong></li>
                                        <li>Kajian Laporan dan Keputusan sertifikasi dilakukan <strong>Chief Executive Officer</strong> dan dapat dibantu Lead Auditor/Auditor/Tenaga Ahli apabila Chief Executive Officer tidak memiliki kompetensi dan/atau terlibat kegiatan audit</li>
                                        <li>Kegiatan audit dilakukan oleh <strong>Lead Auditor, Auditor</strong> dan/atau dibantu oleh <strong>Tenaga Ahli</strong> </li>
                                        <li>Kegiatan terkait dengan persiapan dan setelah pelaksanaan audit dilakukan oleh <strong>Manager Technical</strong></li>
                                        <li>Kegiatan terkait dengan keuangan, pengelolaan sumber daya manusia dan pemasaran produk dilakukan oleh <strong>Manager Corporate</strong></li>
                                        <li>Kegiatan pengelolaan sistem dilakukan oleh <strong>Manager Development</strong></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of struktur organisasi -->
                </li>
                <li>
                    <!-- ketidakberpihakan -->
                    <div class="uk-container">
                        <div id="visi-misi">
                            <p class="description">Di dalam menjaga prinisip ketidakberpihakan, PT Global Improvement Certification (GIC) dalam melakukan setiap keputusan terkait proses sertifikasi dan hasil sertifikasi harus berdasarkan bukti objektif, dapat diuji kebenarannya serta tidak terpengaruh oleh pihak lain.</p>
                            <p class="description">Segenap personal PT Global Improvement Certification (GIC) akan menyatakan setiap ancaman dari ketidakberpihakan yang termasuk :</p>
                            <div id="ketidakberpihakan" class="pt-15">
                                <ul class="uk-list uk-list-disc custom-list">
                                    <li><strong>Kepentingan diri sendiri,</strong> yang berarti bahwa personel PT Global Improvement Certification (GIC) tidak akan bertindak atas nama dan tujuan sendiri atau untuk mendapatkan keuntungan keuangan.</li>
                                    <li><strong>Ancaman ulasan diri,</strong> yang berarti bahwa personel PT Global Improvement Certification (GIC) tidak akan mengaudit perusahaan yang telah dikonsultankan sendiri atau menjadi internal auditor di perusahaan tersebut dalam kurun waktu min 2 tahun.</li>
                                    <li><strong>Ancaman kepercayaan atau hubungan kedekatan,</strong> yang berarti bahwa personel PT Global Improvement Certification (GIC) tidak diperbolehkan dalam kedekatan emosional atau hubungan kekeluargaan dengan klien/auditee.</li>
                                    <li><strong>Ancaman intimidasi,</strong> yang berarti bahwa personel PT Global Improvement Certification (GIC) apabila mendapatkan tekanan atau paksaan, oleh individu atau organisasi, harus melaporkan hal tersebut kepada PT Global Improvement Certification (GIC) dalam menangani hal tersebut.</li>
                                </ul>
                            </div>
                        </div>
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
                                    <li>Perusahaan/instansi/institusi yang telah disertifikasi oleh PT Global Improvement Certification (GIC), berhak untuk membubuhkan Logo Sertifikasi PT Global Improvement Certification (GIC) pada kertas tulis (kertas kepala surat, pernyataan, laporan, brosur, kartu nama, amplop atau hal lain yang relevan dengan standar dan ruang lingkup yang telah disertifikasi oleh PT Global Improvement Certification (GIC)).</li>
                                    <li>Perusahaan/instansi/institusi yang telah disertifikasi oleh PT Global Improvement Certification (GIC) berhak menggunakan Logo Sertifikasi PT Global Improvement Certification (GIC) pada bahan Publisitasnya asalkan memenuhi ketentuan pada Poin  2.</li>
                                    <li>Perusahaan/instansi/institusi yang telah disertifikasi oleh PT Global Improvement Certification (GIC) berhak menggunakan pernyataan disertifikasi oleh PT Global Improvement Certification (GIC) asalkan Perusahaan/instansi/institusi tersebut menjamin sertifikasi tersebut tidak digunakan untuk kegiatan yang ruang lingkupnya tidak disertifikasi.</li>
                                    <li>Logo Sertifikasi PT Global Improvement Certification (GIC) tidak boleh dibubuhkan pada barang (produk) dan kemasan yang diperjualbelikan serta tidak boleh dibubuhkan pada laporan uji laboratorium, kalibrasi atau inspeksi.</li>
                                    <li>Logo Sertifikasi PT Global Improvement Certification (GIC) tidak boleh lagi dibubuhkan pada kemasan produk termasuk dalam (Packaging), Logo tersebut diganti dengan pernyataan/statement seperti contoh sebagai berikut :  “tersertifikasi ISO 9001:2015 oleh PT Global Improvement Certification (GIC)”.</li>
                                </ul>
                            </div>
                            <h3 style="font-size: 22px;">Ketentuan Lain Dalam Menggunakan Logo Sertifikasi PT Global Improement Certification (GIC) </h3>
                            <div id="ketidakberpihakan" class="pt-15">
                                <ul class="uk-list uk-list-disc custom-list">
                                    <li>Logo Sertifikasi PT Global Improvement Certification (GIC) atau tiap pernyataan “disertifikasi/tersertifikasi oleh PT Global Improvement Certification (GIC)“ tidak boleh digunakan untuk menyatakan baik secara langsung atau tidak langsung bahwa PT Global Improvement Certification (GIC) bertanggung jawab atas penyalahgunaan, pendapat atau penafsiran yang berasal dari penggunaan logo tersebut.</li>
                                    <li>Jika Perusahaan/instansi/institusi yang telah disertifikasi sedang mengalami pembekuan sertifikasi maka Perusahaan/instansi/institusi tersebut dilarang menggunakan sertifikasi sistem manajemen atas nama PT Global Improvement Certification (GIC) untuk keperluan promosi lebih lanjut.</li>
                                    <li>Perusahaan/instansi/institusi yang masa sertifikasinya telah berakhir, dan tidak diperpanjang harus segera menghentikan penyebarluasan tulisan yang berisi pernyataan “disertifikasi oleh PT Global Improvement Certification (GIC)” dan dilarang menggunakan Logo Sertifikasi PT Global Improvement Certification (GIC) untuk keperluan promosi lebih lanjut.</li>
                                    <li>Penggunaan Logo Sertifikasi PT Global Improvement Certification (GIC)harus memenuhi ketentuan ini.</li>
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
