<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index($link)
    {
        $service = Service::with(['image', 'link'])
            ->whereHas('link', function ($q) use ($link) {
                $q->where('link', '=', $link);
            })->first();

        if (!$service) {
            return view('404');
        }

        return view('service', compact('service'));
    }
}
