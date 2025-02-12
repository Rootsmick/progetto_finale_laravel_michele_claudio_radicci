<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Article $article, Request $request, $name = null)
    {
        if (!$name) {
            $name = $request->query('name');
        }

        $articlesQuery = Article::query();

        if ($name) {
            $articlesQuery->where('name', 'like', "%$name%")->where(function ($query) {
                $query->where('user_id', auth()->user()->id)->orWhere('user_id', 0);
            });
        } else {
            $articlesQuery->where(function ($query) {
                $query->where('user_id', auth()->user()->id)->orWhere('user_id', 0);
            });
        }

        $articles = $articlesQuery->get();

        return view('index', ['articles' => $articles]);
    }

    public function home()
    {
        return view('home');
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        Article::create([
            'name' => $request->name,
            'body' => $request->body,
            'user_id' => auth()->user()->id,
        ]);
        return redirect('/index');
    }

    public function show(Article $article)
    {
        return view('show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article->update([
            'name' => $request->name,
            'body' => $request->body,
        ]);
        return redirect('/index');
    }

    public function deleteArticle(Article $article)
    {
        $article->delete();
        return redirect('/index');
    }
}
