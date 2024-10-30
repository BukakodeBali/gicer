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
                        <p class="title" style="margin-bottom: 20px;">Informasi Kontak</p>
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

