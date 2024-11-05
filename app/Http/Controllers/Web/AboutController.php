<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            'title' => 'Tentang Kami',
            'meta_description' => 'Global Improvement Certification merupakan lembaga sertifikasi untuk sistem manajemen internasional (ISO)'
        ]);
    }
}
