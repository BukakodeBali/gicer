<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            'title' => 'Tentang Kami',
            'meta_description' => 'Karya Sinergi Manajemen merupakan lembaga penilaian kesesuaian untuk sistem manajemen internasional (ISO)'
        ]);
    }
}
