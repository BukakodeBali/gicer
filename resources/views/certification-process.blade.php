@extends('layout')
@section('content')
    <!-- alur sertifikasi -->
    <div id="visi-misi" class="bg-dots-container struktur">
        <div class="uk-container uk-container-small" uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 500">
            <div class="uk-text-center">
                <h3>Alur Sertifikasi</h3>
            </div>
            <img src="{{ asset('assets/images/base/alur-sertifikasi.png') }}" class="pt-15" alt="struktur-organisasi">
            <h3 style="font-size: 28px;padding-top:30px">Keterangan :</h3>
            <ul id="keterangan" uk-accordion>
                <li class="uk-open">
                    <a class="uk-accordion-title" href="#">1. Permohonan</a>
                    <div class="uk-accordion-content">
                        <p>Pemohon harus memberikan informasi yang jelas dan lengkap pada formulir tersebut berkenaan dengan hal berikut :</p>
                        <ul class="uk-list uk-list-disc custom-list">
                            <li>Ruang lingkup sertifikasi yang diinginkan</li>
                            <li>Fitur umum dari sistem manajemen pemohon, mencakup nama dan alamat dari lokasi fisik, aspek signifikan dari proses dan operasinya, serta kewajiban hukum lainnya yang sesuai</li>
                            <li>Informasi umum sesuai bidang sertifikasi yang dimohon, berkenaan dengan sistem manajemen pemohon seperti aktivitas, sumber daya manusia dan teknis, fungsi dan jika ada hubungan dengan sistem manajemen yang lebih besar</li>
                            <li>Informasi mengenai seluruh proses yang disubkontrakan digunakan oleh pemohon dan akan mempengaruhi kesesuaian terhadap persyaratan</li>
                            <li>Standar atau persyaratan lain keperluan sertifikasi sistem manajemen pemohon</li>
                            <li>Informasi tentang kelengkapan dokumen manual dan implementasinya</li>
                            <li>Informasi tentang pelaksanaan internal audit dan tinjauan manajemen</li>
                            <li>Informasi kesiapan untuk diaudit</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title" href="#">2. Kajian Permohonan</a>
                    <div class="uk-accordion-content">
                        <p>Permohonan dilakukan kajian untuk memastikan bahwa yang diuraikan dibawah ini dipenuhi :</p>
                        <ul class="uk-list uk-list-disc custom-list">
                            <li>Informasi mengenai lingkup pemohon dan standar sistem manajemen adalah cukup untuk melaksanakan audit</li>
                            <li>Persyaratan untuk sertifikasi telah ditetapkan dan didokumentasikan dengan jelas, serta telah disediakan bagi organisasi pemohon</li>
                            <li>Setiap perbedaan pemahaman antara Global Improvement Certification dan organisasi pemohon telah terselesaikan</li>
                            <li>Global Improvement Certification memiliki kompetensi dan kemampuan untuk melaksanakan kegiatan sertifikasi</li>
                            <li>Lingkup sertifikasi, lokasi operasi dari organisasi pemohon, waktu yang diperlukan untuk audit secara lengkap dan setiap kegiatan lainnya yang mempengaruhi kegiatan sertifikasi telah diperhitungkan (bahasa, kondisi keamanan, ancaman terhadap ketidakberpihakan, dll)</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title" href="#">3. Audit Tahap I</a>
                    <div class="uk-accordion-content">
                        <p>Agenda audit tahap 1 sertifikasi sistem manajemen mutu adalah sebagai berikut :</p>
                        <ul class="uk-list uk-list-disc custom-list">
                            <li>Meninjau informasi terdokumentasi sistem manajemen</li>
                            <li>Mengevaluasi kondisi spesifik lokasi dan melakukan diskusi dengan personel untuk menentukan kesiapan tahap 2.</li>
                            <li>Meninjau status dan pemahaman tentang persyaratan standar, khususnya yang berkaitan dengan identifikasi kinerja utama atau aspek, proses, tujuan, dan operasi sistem manajemen yang signifikan.</li>
                            <li>memperoleh informasi yang diperlukan mengenai ruang lingkup sistem manajemen termasuk situs, proses dan peralatan yang digunakan, tingkat kontrol yang ditetapkan, persyaratan hukum dan peraturan yang berlaku.</li>
                            <li>Meninjau alokasi sumber daya untuk tahap 2 dan persetujuan rincian tahap 2.</li>
                            <li>Memberikan fokus untuk perencanaan tahap 2 dengan memperoleh pemahaman yang memadai tentang sistem manajemen dan operasi situs dalam konteks standar sistem manajemen atau dokumen normatif lainnya.</li>
                            <li>Mengevaluasi apakah audit internal dan tinjauan manajemen sedang direncanakan atau sudah dilaksanakan, dan memastikan bahwa tingkat penerapan sistem manajemen membuktikan bahwa klien siap untuk tahap 2.</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title" href="#">4. Audit Tahap II</a>
                    <div class="uk-accordion-content">
                        <p>Audit tahap 2 adalah untuk mengevaluasi implementasi, termasuk efektifitas sistem manajemen perusahaan. Audit tahap 2 dilaksanakan di lokasi pelanggan. Audit mencakup minimal hal-hal berikut :</p>
                        <ul class="uk-list uk-list-disc custom-list">
                            <li>Informasi dan bukti tentang kesesuaian untuk seluruh persyaratan sistem manajemen yang berlaku atau dokumen normatif lainnya</li>
                            <li>Pemantauan, pengukuran, pelaporan, dan pengkajian kinerja dibandingkan dengan sasaran dan target kinerja yang utama (sesuai dengan harapan dalam sistem manajemen atau dokumen normatif lainnya yang berlaku)</li>
                            <li>Sistem manajemen dan unjuk kerja pelanggan terkait pemenuhan legal</li>
                            <li>Pengendalian operasional proses-proses di pelanggan</li>
                            <li>Internal audit dan kaji ulang manajemen</li>
                            <li>Tanggung jawab manajemen untuk kebijakan perusahaan</li>
                        </ul>
                        <p>Yang berhubungan antara persyaratan normatif, kebijakan, sasaran dan target kinerja (sesuai dengan harapan dalam sistem manajemen atau dokumen normatif lainnya yang berlaku), setiap persyaratan legal yang berlaku, tanggung jawab, kompetensi personel, operasional, prosedur, data kinerja dan temuan internal audit dan kesimpulan.</p>
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title" href="#">5. Pernerbitan <i>Intial Certification</i></a>
                    <div class="uk-accordion-content">
                        <p>Penerbitan sertifikasi awal pada Global Improvement Certification dilakukan berdasarkan informasi yang disediakan oleh tim audit untuk memutuskan sertifikasi, mencakup :</p>
                        <ul class="uk-list uk-list-disc custom-list">
                            <li>Laporan audit,</li>
                            <li>Keterangan pada ketidaksesuaian, dan jika tersedia, koreksi dan tindakan korektif yang dilakukan oleh pelanggan,</li>
                            <li>Konfirmasi tentang informasi yang disediakan untuk Global Improvement Certification yang digunakan dalam pengkajian permohonan, dan</li>
                            <li>Rekomendasi diberikan atau tidak diberikannya sertifikasi, serta setiap kondisi atau observasi</li>
                        </ul>
                        <p>SKManajemen membuat keputusan sertifikasi berdasarkan pada evaluasi temuan audit dan kesimpulan audit serta informasi sesuai lainnya (sebagai contoh informasi publik, keterangan pada laporan audit dari pelanggan).</p>
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title" href="#">6. <i>Surveillance Audit</i></a>
                    <div class="uk-accordion-content">
                        <p>Audit pengawasan perlu dilaksanakan pada bulan ke 11 dan bulan ke 22 sejak penerbitan sertifikasi awal. Program audit pengawasan mencakup, minimal :</p>
                        <ul class="uk-list uk-list-disc custom-list">
                            <li>Internal audit dan kaji ulang manajemen</li>
                            <li>Tinjauan tindakan yang diambil terhadap ketidaksesuaian yang diidentifikasi selama audit sebelumnya</li>
                            <li>Penanganan keluhan</li>
                            <li>Efektifitas sistem manajemen untuk pencapaian sasaran perusahaan tersertifikasi</li>
                            <li>Kemajuan dari aktifitas yang direncanakan untuk peningkatan berkelanjutan</li>
                            <li>Keberlanjutan pengendalian operasional</li>
                            <li>Tinjauan setiap perubahan, dan</li>
                            <li>Penggunaan logo dan/atau referensi sertifikasi lainnya.</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title" href="#">7. <i>Recertification Audit</i> & Perluasan Lingkup</a>
                    <div class="uk-accordion-content">
                        <p>Audit sertifikasi ulang mencakup audit lapangan yang dilakukan untuk hal-hal sebagai berikut :</p>
                        <ul class="uk-list uk-list-disc custom-list">
                            <li>Efektifitas penerapan standar usaha pariwisata secara menyeluruh terkait dengan perubahan internal atau eksternal dan relevansi dan kemampuan pelaksanaanya untuk lingkup sertifikasi.</li>
                            <li>Menunjukkan komitmen untuk memelihara efektivitas dan peningkatan penerapan standar usaha pariwisata untuk mencapai kinerja secara keseluruhan.</li>
                            <li>Apakah pengoperasian sistem manajemen yang disertifikasi berkontribusi terhadap pencapaian kebijakan dan sasaran organisasi.</li>
                        </ul>
                        <p><strong>Perluasan Lingkup</strong></p>
                        <p>Global Improvement Certification membolehkan kepada setiap pelanggan pemegang sertifikat untuk mengajukan permohonan perluasan ruang lingkup sertifikasi. Sebelum perluasan lingkup diberikan terlebih dahulu dilakukan suatu kajian terhadap permohonan dan menentukan kegiatan audit yang penting untuk memutuskan apakah perluasan lingkup dapat diberikan atau tidak, hal ini dapat dilakukan bersamaan dengan pelaksanaan surveillance audit.</p>
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title" href="#">8. Pembekuan</a>
                    <div class="uk-accordion-content">
                        <p>Pembekuan sertifikasi dapat terjadi pada kasus berikut ini :</p>
                        <ul class="uk-list uk-list-disc custom-list">
                            <li>Sistem manajemen pelanggan yang disertifikasi gagal secara total memenuhi persyaratan sertifikasi,</li>
                            <li>Pelanggan yang disertifikasi tidak membolehkan audit survailen atau sertifikasi ulang dilaksanakan pada frekwensi yang dipersyaratkan, atau</li>
                            <li>Pelanggan yang disertifikasi meminta pembekuan secara sukarela.</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title" href="#">9. Pencabutan</a>
                    <div class="uk-accordion-content">
                        <p>Kegagalan untuk menyelesaikan masalah pokok dari pembekuan dalam jangka waktu yang ditetapkan, dapat berakibat pencabutan atau pengurangan ruang lingkup sertifikasi. Dasar dari pencabutan status sertifikasi antara lain :</p>
                        <ul class="uk-list uk-list-disc custom-list">
                            <li>Tindakan perbaikan pada ketidaksesuaian yang telah diambil oleh klien tidak memadai dalam kasus pembekuan Sertifikat</li>
                            <li>Klien belum menyelesaikan administrasi (pembayaran) sesuai waktu yang telah ditetapkan</li>
                            <li>Berdasarkan hasil short notice audit ditemukan rekomendasi negatif (keluhan/perubahan)</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title" href="#">10. Pengurangan Lingkup</a>
                    <div class="uk-accordion-content">
                        <p>Ruang lingkup sertifikasi pelanggan dapat dikurangi berdasarkan :</p>
                        <ul class="uk-list uk-list-disc custom-list">
                            <li>Untuk bagian-bagian yang tidak memenuhi persyaratan,</li>
                            <li>Apabila perusahaan gagal secara total memenuhi persyaratan sertifikasi untuk bagian-bagian dari ruang lingkup sertifikasi tersebut.</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="uk-accordion-title" href="#">11.	Pemulihan Status Pembekuan Sertifikasi</a>
                    <div class="uk-accordion-content">
                        <p></p>
                        <ul class="uk-list uk-list-disc custom-list">
                            <li>Pembekuan terhadap status sertifikasi klien dapat dipulIhkan dengan ketentuan yaitu permasalahan yang mengakibatkan pembekuan telah diselesaikan oleh klien sebelum melewati batas waktu pembekuan yang telah ditetapkan (3 bulan sejak status sertifikat dibekukan).</li>
                            <li>Global Improvement Certification akan melakukan review terkait dengan status sertifikasi klien, dimana hasil review digunakan untuk memulihkan status pembekuan menjadi tersertifikasi kembali.</li>
                            <li>Global Improvement Certification akan menginformasikan pemulihan status pembekuan kepada klien secara formal melalui surat tertulis.</li>
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
