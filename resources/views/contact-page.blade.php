@extends('layout')
@section('content')
    <div id="contact" class="uk-container-expand">
        <div class="uk-container">
            <div class="uk-grid-match bottom-spacing uk-grid-small" uk-grid>
                <div id="app" class="uk-width-1-1@s uk-width-1-2@m uk-width-2-5@l">
                    <div class="card-outer">
                        <p class="title">kami ingin membantu</p>
                        <p class="description">Anda dapat menghubungi kami apabila ada pertanyaan terkait dengan layanan kami, melalui form dan informasi kontak yg tersedia</p>
                        <!-- form contact -->
                        <form v-on:submit.prevent="submitContact">
                            <fieldset class="uk-fieldset">
                                <div class="">
                                    <input
                                        class="uk-input input-form"
                                        type="email" name="email"
                                        placeholder="Email"
                                        v-model="formData.email"
                                    >
                                    <p class="error-message">@{{ emailError }}</p>
                                </div>
                                <div class="uk-margin">
                                    <input
                                        class="uk-input input-form"
                                        type="subjek"
                                        name="subjek"
                                        placeholder="Subjek"
                                        v-model="formData.subject"
                                    >
                                    <p class="error-message">@{{ subjectError }}</p>
                                </div>
                                <div class="uk-margin">
                                    <input
                                        class="uk-input input-form error"
                                        type="nama"
                                        name="nama"
                                        placeholder="Nama"
                                        v-model="formData.name"
                                    >
                                    <p class="error-message"> @{{ nameError }}</p>
                                </div>
                                <div class="uk-margin">
                                            <textarea
                                                class="uk-textarea input-form"
                                                rows="4"
                                                type="pesan"
                                                name="pesan"
                                                placeholder="Pesan"
                                                v-model="formData.message"
                                            >
                                            </textarea>
                                    <p class="error-message">@{{ messageError }}</p>
                                </div>
                                <button
                                    class="uk-button uk-button-primary btn-ksm-slider"
                                    type="submit"
                                    :disabled="loading"
                                    v-html="loading ? `Tunggu...`:`Submit`"
                                ></button>
                            </fieldset>
                        </form>
                        <!-- end form contact -->
                    </div>
                </div>
                <div class="uk-width-expand@m">
                    <div class="card-outer info">
                        <div id="tentang-kami" class="uk-container-expand bg-mandala-container" style="padding: 0;background: transparent">
                            <div class="uk-container" uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 500">
                                <!-- tabs -->
                                <ul class="uk-flex-left" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium" uk-tab>
                                    <li class="tabs-title"><a href="#">Informasi Kontak</a></li>
                                    <li class="tabs-title"><a href="#">Mekanisme Keluhan & Banding</a></li>
                                    <li class="tabs-title"><a href="#">Whistle Blowing System</a></li>
                                </ul>
                                <!-- tab content -->
                                <ul class="uk-switcher uk-margin">
                                    <li>
                                        <!-- kontak kami -->
                                        <div class="uk-container">
                                            <p class="mb-5 mt-0"><strong>Alamat</strong></p>
                                            <p class="mt-0 description">Indonesia Stock Exchange Tower 1 Level 3, Unit 304, JI. Jendral Sudirman Kav 52-53, Desa/Kelurahan Senayan, Kec. Kebayoran Baru, Kota Adm. Jakarta Selatan, Provinsi DKI Jakarta, Kode Pos: 12190</p>

                                            <p class="mb-5 mt-0"><strong>Telephone</strong></p>
                                            <p class="mt-0 description">
                                                <a href="tel:02150106260">021-50106260</a>
                                            </p>

                                            <p class="mb-5 mt-0"><strong>Email</strong></p>
                                            <p class="mt-0 description">
                                                <a href="mailto:info@certificationimprovement.com">info@certificationimprovement.com</a>
                                            </p>

                                            <p class="title" style="margin-bottom: 20px; margin-top: 30px">Keluhan & Banding</p>
                                            <p class="mb-5 mt-0"><strong>Keluhan dapat di ajukan melalui email berikut:</strong></p>
                                            <p class="mt-0 description">
                                                <a href="mailto:development@certificationimprovement.com">development@certificationimprovement.com</a>
                                            </p>

                                            <p class="mb-5 mt-0"><strong>Banding dapat di ajukan melalui email berikut:</strong></p>
                                            <p class="mt-0 description">
                                                <a href="mailto:development@certificationimprovement.com">development@certificationimprovement.com</a>
                                            </p>
                                        </div>
                                        <!-- end of kontak kami -->
                                    </li>
                                    <li>
                                        <!-- keluhan banding -->
                                        <div class="uk-container">
                                            <div id="visi-misi">
                                                <h3 style="font-size: 20px;padding:0px">Mekanisme Keluhan</h3>
                                                <p class="description">Klien memberikan keluhan baik secara lisan maupun tulisan, melalui media tatap muka (pada saat kunjungan), surat, website, email dan telepon. Keluhan yang diterima akan dicatat dalam Form Keluhan Pelanggan.</p>
                                                <p class="description" style="margin: 0;"><strong>Penanganan Keluhan Pelanggan</strong></p>
                                                <div id="ketidakberpihakan" class="pt-15">
                                                    <ul class="uk-list uk-list-disc custom-list">
                                                        <li>Divisi terkait melakukan investigasi atas keluhan dan mencatatnya dalam formulir Permintaan Tindakan Korektif.</li>
                                                        <li>Selanjutnya Divisi terkait melakukan tindakan korektif, yang kemudian diverifikasi oleh Manager Development.</li>
                                                        <li>Manager Development memperbaharui formulir Permintaan Tindakan Korektif dan menutup (closed out) kasus jika sudah diselesaikan. </li>
                                                        <li>Masing-masing Divisi memberikan jawaban atas keluhan Pelanggan.</li>
                                                    </ul>
                                                </div>
                                                <p class="description" style="margin: 0;"><strong>Mekanisme Tindak Lanjut Keluhan</strong></p>
                                                <div id="ketidakberpihakan" class="pt-15">
                                                    <ul class="uk-list uk-list-disc custom-list">
                                                        <li>Sebagai pertanggungjawaban atas penanganan keluhan, maka seluruh keluhan yang ada dan tindakan perbaikan yang diambil dilaporkan pada Rapat Tinjauan Manajemen.</li>
                                                    </ul>
                                                </div>
                                                <p class="description" style="margin: 0;"><strong>Mekanisme Pengukuran Kepuasan Pelanggan</strong></p>
                                                <div id="ketidakberpihakan" class="pt-15">
                                                    <ul class="uk-list uk-list-disc custom-list">
                                                        <li>Pada saat dilaksanakan audit di klien (onsite audit), tim audit yang ditugaskan memberikan Form Kepuasan Pelanggan kepada klien untuk melihat kinerja auditor dan pelayanan secara keseluruhan yang diberikan oleh PT Global Improvement Certification.</li>
                                                        <li>Hasil isian form tersebut kemudian diberikan kepada Manager Development untuk dilakukan evaluasi.</li>
                                                        <li>Laporan Evaluasi Kepuasan Pelanggan beserta seluruh lampiran diarsip oleh Manager Development.</li>
                                                    </ul>
                                                </div>
                                                <h3 style="font-size: 20px;padding:0px">Mekanisme Banding</h3>
                                                <p class="description">Banding terhadap hasil sertifikasi dapat diajukan oleh klien tersertifikasi PT Global Improvement Certification, adapun banding dapat berupa hasil audit, keputusan sertifikasi dan/atau hasil keputusan yang berdampak terhadap klien.</p>
                                                <div id="ketidakberpihakan" class="pt-15">
                                                    <ul class="uk-list uk-list-disc custom-list">
                                                        <li>Klien mengajukan banding dengan mengirimkan Surat Banding yang ditujukan kepada Direktur PT Global Improvement Certification.</li>
                                                        <li class="dot-top">
                                                            Berdasarkan surat banding yang diterima, Direktur akan membentuk tim banding yang berisi Ketua dan anggota tim, dengan ketentuan :
                                                            <ul class="uk-list uk-list-numeric custom-list small">
                                                                <li>Tim Banding dapat terdiri dari personil dari perwakilan PT Global Improvement Certification, Auditor dan/atau Tenaga Ahli yang tidak terlibat kegiatan audit serta salah satu perwakilan stakeholder.</li>
                                                                <li>Apabila diperlukan Tim Banding dapat melibatkan penasehat hukum yang ditunjuk untuk dan atas nama PT Global Improvement Certification untuk menangani proses penanganan banding.</li>
                                                            </ul>
                                                        </li>
                                                        <li>Keputusan rapat tim banding dilakukan secara musyawarah. Apabila tidak tercapai secara musyawarah, keputusan dilakukan secara voting.</li>
                                                        <li>Keputusan Banding ditandatangani oleh Ketua dan anggota Tim Banding yang ditunjuk, kemudian hasil rapat diserahkan kepada Chief Executive Officer untuk ditindaklanjuti.</li>
                                                        <li>Proses penanganan banding didokumentasikan oleh <i>Manager Development</i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of keluhan banding -->
                                    </li>
                                    <li>
                                        <!-- whistle blowing banding -->
                                        <div class="uk-container">
                                            <div id="visi-misi">
                                                <p class="description"><strong>Laporkan segala bentuk pelanggaran atau penyalahgunaan wewenang di lingkungan perusahaan kami.</strong> Kami menjamin kerahasiaan identitas Anda dan akan menindaklanjuti laporan Anda secara profesional dan transparan demi terciptanya lingkungan kerja yang jujur dan aman. </p>
                                                <p class="description">Laporkan melalui button berikut:</p>
                                                <a href="mailto:corporate@certificationimprovement.com">
                                                    <button uk-slider-parallax="y: 80,-80;" class="uk-button uk-button-primary btn-ksm-slider">
                                                        Lapor
                                                        <span class="pl-5" uk-icon="icon: mail;"></span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- end of whistle blowing banding -->
                                    </li>
                                </ul>
                                <!-- end of tabs -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact -->
@endsection
@push('menu')
    @include('menu')
@endpush

@push('footer')
    @include('footer')
@endpush

@push('offcanvas')
    @include('offcanvas')
@endpush
@push('page-script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"
            integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg=="
            crossorigin="anonymous">
    </script>

    <script src="{{ asset('assets/js/contact-updated.js') }}"></script>
@endpush

