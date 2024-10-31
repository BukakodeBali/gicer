@extends('layout')
@section('content')
    <!-- alur sertifikasi -->
    <div id="visi-misi" class="bg-dots-container struktur">
        <div class="uk-container uk-container-small" uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 500">
            <div class="uk-text-center" style="margin-bottom: 15px;">
                <h3 style="padding-top: 0;">Alur Sertifikasi</h3>
            </div>
            <p class="uk-text-justify">Dalam proses sertifikasi PT Global Improvement Certification (GIC) berkomitmen pada prinsip ketidakberpihakan jadi di setiap proses sertifikasi selalu dilakukan evaluasi konflik kepentingan dan memitigasi resiko-resiko yang mungkin timbul dalam proses sertifikasi. Berikut merupakan gambaran besar dari proses sertifikasi apabila ingin mengetahui lebih detail dan terperinci silakan menghubungi kami </p>
            <img src="{{ asset('assets/images/base/alur-sertifikasi.png') }}" class="pt-15" alt="struktur-organisasi"><h3 style="font-size: 26px;margin-top: 25px">Katagori Ketidaksesuaian pada saat audit :</h3>
            <ul id="keterangan" uk-accordion="multiple: true">
                <li class="uk-open">
                    <a class="uk-accordion-title" href="#">Major</a>
                    <div class="uk-accordion-content">
                        <ul class="uk-list uk-list-disc">
                            <li>Kegagalan pemenuhan persyaratan sertifikasi yang berdampak signifikan </li>
                            <li>Akumulasi ketidaksesuaian minor di area atau fungsi tertentu </li>
                            <li>Ketidaksesuaian berulang dari hasil audit sebelumnya</li>
                            <li>Waktu penyelesaian 1 bulan</li>
                        </ul>
                    </div>
                </li>
                <li class="uk-open">
                    <a class="uk-accordion-title" href="#">Minor</a>
                    <div class="uk-accordion-content">
                        <ul class="uk-list uk-list-disc">
                            <li>Ketidakonsistenan dalam penerapan persyaratan sertifikasi atau </li>
                            <li>Ketidakonsistenan dalam penerapan sistem atau prosedur yang dimiliki oleh calon klien/klien</li>
                            <li>Observasi yang tidak ditindaklanjuti oleh calon klien/klien sehingga menyebabkan ketidakkonsistenan dalam penerapan persyaratan sertifikasi</li>
                            <li>Waktu penyelesaian 2 bulan</li>
                        </ul>
                    </div>
                </li>
                <li class="uk-open">
                    <a class="uk-accordion-title" href="#">Observasi</a>
                    <div class="uk-accordion-content">
                        <ul class="uk-list uk-list-disc">
                            <li>Peluang bagi calon klien/klien untuk melakukan perbaikan</li>
                            <li>Potensi ketidaksesuaian minor namun belum didukung oleh bukti-bukti yang cukup</li>
                            <li>Tidak berkewajiban untuk mengirimkan tindakan atas observasi yang diterbitkan</li>
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
