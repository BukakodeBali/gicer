<?php

namespace App\Http\Controllers\Web;

class ContactController
{
    public function index()
    {
        return view('contact-page', [
            'title' => 'Kontak',
            'meta_description' => 'Dapatkan informasi mengenai ISO, biaya sertifikasi ISO, Karya Sinergi Manajemen siap melayani'
        ]);
    }
}
