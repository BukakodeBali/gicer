<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->per_page ?? 10;
        $articles = Article::with(['image', 'link', 'categories', 'categories.link'])
            ->whereStatus('published')
            ->orderByDesc('id');
        $articles = $perPage !== 'all' ? $articles->paginate(intval($perPage)) : $articles->paginate(100);
        $articles = $articles->withPath('/berita');
        $articles = $articles->toArray();

        $latestArticles = Article::latestData()->get()->toArray();

        return view('list-article', [
            'articles' => $articles,
            'latestArticles' => $latestArticles
        ]);
    }

    public function show($link)
    {
        $article = Article::with(['image', 'link', 'categories', 'categories.link'])
            ->whereHas('link', function ($q) use ($link) {
                $q->where('link', '=', $link);
            })->first();

        if (!$article) {
            return view('404');
        }

        $latestArticles = Article::latestData()->get()->toArray();

        return view('detail-article', [
            'title' => $article['title'],
            'article' => $article,
            'link' => 'berita/'.$article['link']['link'] ?? '',
            'meta_description' => $article['link']['meta_description'] ?? '',
            'latestArticles' => $latestArticles
        ]);
    }


}
