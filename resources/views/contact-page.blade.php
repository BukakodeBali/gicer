@extends('layout')
@section('content')
<div id="contact" class="uk-container-expand">
    <div class="uk-container">
        <div class="uk-grid-match bottom-spacing uk-grid-small" uk-grid>
            <div id="app" class="uk-width-1-1@s uk-width-1-2@m uk-width-2-5@l">
                <div class="card-outer">
                    <p class="title">ada yang bisa kami bantu?</p>
                    <p class="description">Anda dapat menghubungi kami apabila ada pertanyaan terkait dengan layanan kami, melalui form dan informasi kontak yg tersedia</p>
                    <!-- form contact -->
                    <form v-on:submit.prevent="submitContact">
                        <fieldset class="uk-fieldset">
                            <div class="">
                                <input
                                    class="uk-input input-form"
                                    type="email" name="email"
                                    placeholder="Email"
                                    v-model="formData.email">
                                <p class="error-message">@{{ emailError }}</p>
                            </div>
                            <div class="uk-margin">
                                <input
                                    class="uk-input input-form"
                                    type="subjek"
                                    name="subjek"
                                    placeholder="Subjek"
                                    v-model="formData.subject">
                                <p class="error-message">@{{ subjectError }}</p>
                            </div>
                            <div class="uk-margin">
                                <input
                                    class="uk-input input-form error"
                                    type="nama"
                                    name="nama"
                                    placeholder="Nama"
                                    v-model="formData.name">
                                <p class="error-message"> @{{ nameError }}</p>
                            </div>
                            <div class="uk-margin">
                                <textarea
                                    class="uk-textarea input-form"
                                    rows="4"
                                    type="pesan"
                                    name="pesan"
                                    placeholder="Pesan"
                                    v-model="formData.message">
                                            </textarea>
                                <p class="error-message">@{{ messageError }}</p>
                            </div>
                            <button
                                class="uk-button uk-button-primary btn-ksm-slider"
                                type="submit"
                                :disabled="loading"
                                v-html="loading ? `Tunggu...`:`Submit`"></button>
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
                                        <p class="mb-5 mt-0"><span style="font-weight: 500;">Alamat</span></p>
                                        <p class="mt-0 description">Indonesia Stock Exchange Tower 1 Level 3, Unit 304, JI. Jendral Sudirman Kav 52-53, Desa/Kelurahan Senayan, Kec. Kebayoran Baru, Kota Adm. Jakarta Selatan, Provinsi DKI Jakarta, Kode Pos: 12190</p>

                                        <p class="mb-5 mt-0"><span style="font-weight: 500;">Telephone</span></p>
                                        <p class="mt-0 description">
                                            <a href="tel:02150106260">021-50106260</a>
                                        </p>

                                        <p class="mb-5 mt-0"><span style="font-weight: 500;">Email</span></p>
                                        <p class="mt-0 description">
                                            <a href="mailto:info@certificationimprovement.com">info@certificationimprovement.com</a>
                                        </p>
                                    </div>
                                    <!-- end of kontak kami -->
                                </li>
                                <li>
                                    <!-- keluhan banding -->
                                    <div class="uk-container">
                                        <div id="visi-misi">
                                            <h3 style="font-size: 20px;padding:0px">Mekanisme Keluhan</h3>
                                            <p class="description">Organisasi dapat mengajukan keluhan baik secara lisan maupun tulisan, melalui media tatap muka (pada saat kunjungan), surat, website, email dan telepon. Keluhan yang diterima akan dicatat dalam Form Keluhan Pelanggan.</p>
                                            <p class="description" style="margin: 0;">Berikut alur pengajuan keluhan :</p>
                                            <img src="{{ asset('assets/images/base/mekanisme-keluhan.png') }}" class="pt-15" alt="mekanisme-keluhan">
                                            <h3 style="font-size: 20px;padding:0px">Mekanisme Banding</h3>
                                            <p class="description">Banding terhadap hasil sertifikasi dapat diajukan oleh organisasi tersertifikasi PT Global Improvement Certification, adapun banding dapat berupa hasil audit, keputusan sertifikasi dan/atau hasil keputusan yang berdampak terhadap Organisasi.</p>
                                            <p class="description" style="margin: 0;">Berikut alur pengajuan banding :</p>
                                            <img src="{{ asset('assets/images/base/mekanisme-banding.png') }}" class="pt-15" alt="mekanisme-banding">
                                            <p class="title" style="margin-bottom: 20px; margin-top: 30px; font-size: 20px">Keluhan & Banding</p>
                                            <p class="mb-5 mt-0"><span style="font-weight: 500;">Keluhan dapat di ajukan melalui email berikut:</span></p>
                                            <p class="mt-0 description">
                                                <a href="mailto:development@certificationimprovement.com">development@certificationimprovement.com</a>
                                            </p>
                                            <p class="mb-5 mt-0"><span style="font-weight: 500;">Banding dapat di ajukan melalui email berikut:</span></p>
                                            <p class="mt-0 description">
                                                <a href="mailto:development@certificationimprovement.com">development@certificationimprovement.com</a>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- end of keluhan banding -->
                                </li>
                                <li>
                                    <!-- whistle blowing banding -->
                                    <div class="uk-container">
                                        <div id="visi-misi">
                                            <p class="description"><strong>Laporkan segala bentuk pelanggaran atau penyalahgunaan wewenang di lingkungan organisasi kami.</strong> Kami menjamin kerahasiaan identitas Anda dan akan menindaklanjuti laporan Anda secara profesional dan transparan demi terciptanya lingkungan kerja yang jujur dan aman. </p>
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