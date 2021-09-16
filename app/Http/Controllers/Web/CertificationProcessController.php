<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class CertificationProcessController extends Controller
{
    public function index()
    {
        return view('certification-process', [
            'title' => 'Alur Sertifikasi',
            'meta_description' => 'Berikut adalah proses atau alur sertifikasi dari tahap permohonan, kajian permohonan, audit, penerbitan sertifikat'
        ]);
    }
}
