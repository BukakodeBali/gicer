<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class CertificationProcessController extends Controller
{
    public function index()
    {
        return view('certification-process');
    }
}
