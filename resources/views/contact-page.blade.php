@extends('layout')
@section('content')
    <div id="contact" class="uk-container-expand">
        <div id="app" class="uk-grid-match uk-child-width-1-2@m uk-grid-collapse" uk-grid>
            <div class="left-bg" uk-scrollspy="cls: uk-animation-slide-left-medium; delay: 500">
                <div class="uk-card uk-card-default uk-card-body info">
                    <p class="head blue">Informasi <br>Kontak</p>
                    <hr class="bar">
                    <p class="note">Anda dapat menghubungi kami apabila ada pertanyaan terkait dengan layanan kami, melalui form dan informasi kontak yg tersedia</p>
                    <p class="mb-5 mt-0"><STRONG>Alamat</STRONG></p>
                    <p class="mt-0">
                        <span>Office</span> | Jl. Jepun Pipil Gg.XI No.18, Denpasar Timur, Denpasar - Bali <br>
                    </p>
                    <p class="mb-5 mt-0"><STRONG>Telephone</STRONG></p>
                    <p class="mt-0">+6282340165863</p>
                    <p class="mb-5 mt-0"><STRONG>Email</STRONG></p>
                    <p class="mt-0">info@ksmanajemen.com</p>
                </div>
            </div>
            <div class="right-bg" id="app" uk-scrollspy="cls: uk-animation-slide-right-medium; delay: 500">
                <div class="uk-card uk-card-default uk-card-body info">
                    <p class="head white">Form <br>Kontak</p>
                    <hr class="bar white">
                    <!-- form contact -->
                    <form v-on:submit.prevent="submitContact">
                        <fieldset class="uk-fieldset">
                            <div class="">
                                <input
                                    class="uk-input input-form white"
                                    type="email" name="email"
                                    placeholder="Email"
                                    v-model="formData.email"
                                >
                                <p class="error-message">@{{ emailError }}</p>
                            </div>
                            <div class="uk-margin">
                                <input
                                    class="uk-input input-form white"
                                    type="subjek"
                                    name="subjek"
                                    placeholder="Subjek"
                                    v-model="formData.subject"
                                >
                                <p class="error-message">@{{ subjectError }}</p>
                            </div>
                            <div class="uk-margin">
                                <input
                                    class="uk-input input-form white error"
                                    type="nama"
                                    name="nama"
                                    placeholder="Nama"
                                    v-model="formData.name"
                                >
                                <p class="error-message"> @{{ nameError }}</p>
                            </div>
                            <div class="uk-margin">
							            <textarea
                                            class="uk-textarea input-form white"
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
                                class="uk-button uk-button-primary btn-ksm white"
                                type="submit"
                                :disabled="loading"
                                v-html="loading ? `Tunggu...`:`Submit`"
                            ></button>
                        </fieldset>
                    </form>
                    <!-- end form contact -->
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

