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
                            <img src="{{ asset('assets/images/base/struktur-organisasi.png') }}" class="pt-15" alt="struktur-organisasi">
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
