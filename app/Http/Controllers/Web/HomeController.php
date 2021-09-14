<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with(['link', 'image', 'categories', 'categories.link'])
            ->whereStatus('published')
            ->limit(5)
            ->orderByDesc('id')
            ->get()
            ->toArray();
        return view('index', compact('articles'));
    }
}
