<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->per_page ?? 10;
        $keyword = $request->keyword ?? '';
        $articles = Article::with(['image', 'link', 'categories', 'categories.link'])
            ->when($keyword <> '', function ($q) use ($keyword) {
                $q->where('title', 'like', '%'. $keyword .'%');
            })
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
        $article = Article::with(['image', 'link', 'categories', 'categories.link', 'tags'])
            ->whereHas('link', function ($q) use ($link) {
                $q->where('link', '=', $link);
            })->first();

        if (!$article) {
            return abort('404');
        }

        $latestArticles = Article::latestData()->get()->toArray();

        return view('detail-article', [
            'title' => $article['title'],
            'article' => $article,
            'link' => 'berita/'.$article['link']['link'] ?? '',
            'meta_description' => $article['link']['meta_description'] ?? '',
            'latestArticles' => $latestArticles,
            'tags' => $article['tags']
        ]);
    }

    public function category($link)
    {
        $category = Category::with(['link'])
            ->whereHas('link', function ($q) use ($link) {
                $q->where('link', $link);
            })->first();

        if (!$category) {
            abort(404);
        }

        $linkCategory = $category['link']['link'] ?? '';
        $metaCategory = $category['link']['meta_description'] ?? '';

        $perPage = $request->per_page ?? 10;
        $articles = Article::with(['image', 'link', 'categories', 'categories.link'])
            ->whereHas('categories', function ($q) use ($category){
                $q->where('category_id', $category->id);
            })
            ->whereStatus('published')
            ->orderByDesc('id');
        $articles = $perPage !== 'all' ? $articles->paginate(intval($perPage)) : $articles->paginate(100);
        $articles = $articles->withPath('/kategori/'.$linkCategory);
        $articles = $articles->toArray();

        $latestArticles = Article::latestData()->get()->toArray();

        return view('list-article', [
            'title' => $category['name'],
            'meta_description' => $metaCategory,
            'link' => url('kategori/'.$linkCategory),
            'articles' => $articles,
            'latestArticles' => $latestArticles
        ]);
    }
}
