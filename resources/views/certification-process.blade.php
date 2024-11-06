@extends('layout')
@section('content')
    <!-- alur sertifikasi -->
    <div id="visi-misi" class="bg-dots-container struktur">
        <div class="uk-container uk-container-small" uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 500">
            <div class="uk-text-center" style="margin-bottom: 15px;">
                <h3 style="padding-top: 0;">Alur Sertifikasi</h3>
            </div>
            <p class="uk-text-justify">Dalam proses sertifikasi PT Global Improvement Certification (GIC) berkomitmen pada prinsip ketidakberpihakan jadi di setiap proses sertifikasi selalu dilakukan evaluasi konflik kepentingan dan memitigasi resiko-resiko yang mungkin timbul dalam proses sertifikasi. Berikut merupakan gambaran besar dari proses sertifikasi apabila ingin mengetahui lebih detail dan terperinci silakan menghubungi kami </p>
            <img src="{{ asset('assets/images/base/alur-sertifikasi.png') }}" class="pt-15" alt="struktur-organisasi">
            <p class="description">Dalam pelaksanaan sertifikasi oleh PT GIC ada beberapa istilah beserta ketentuannya yang wajib dipatuhi seperti :</p>
            <ul id="keterangan" style="margin-top: 0px;" uk-accordion="multiple: true">
                <li class="uk-open">
                    <a class="uk-accordion-title" href="#">Pembekuan Sertifikasi:</a>
                    <div class="uk-accordion-content">
                        <ul class="uk-list uk-list-disc">
                            <li>Hal ini dapat terjadi apabila Organisasi gagal secara total memenuhi persyaratan sertifikasi, termasuk persyaratan sistem manajemen, atau</li>
                            <li>Organisasi yang disertifikasi tidak membolehkan pelaksanaan survailen atau resertifikasi sesuai program yang ditetapkan, atau</li>
                            <li>Organisasi meminta pembekuan secara sukarela</li>
                            <li>Organisasi tidak menindaklanjuti hasil sesuai batas waktu yang ditetapkan dan perpanjangan waktu yang diberikan</li>
                            <li>Organisasi belum menyelesaikan administrasi pembayaran 1 (satu) bulan setelah pelaksanaan audit</li>
                        </ul>
                    </div>
                </li>
                <li class="uk-open">
                    <a class="uk-accordion-title" href="#">Pengaktifan pembekuan</a>
                    <div class="uk-accordion-content">
                        <p class="description" style="font-size: 14px;">Apabila dalam kurun waktu pembekuan, organisasi telah menyelesaikan hal-hal yang menjadi alasan pembekuan, PT Global Improvement Certification (GIC) akan mengaktifkan pembekuan status sertifikasi organisasi.</p>
                    </div>
                </li>
                <li class="uk-open">
                    <a class="uk-accordion-title" href="#">Pencabutan Sertifikasi:</a>
                    <div class="uk-accordion-content">
                        <ul class="uk-list uk-list-disc">
                            <li>Organisasi gagal menyelesaikan hal-hal yang menjadi alasan pembekuan</li>
                            <li>Hasil short notice yang diterbitkan merekomendasikan pencabutan status sertikasi</li>
                            <li>Organisasi belum menyelesaikan administrasi pembayaran 3 (tiga) bulan setelah pelaksanaan audit</li>
                        </ul>
                    </div>
                </li>
            </ul>
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
