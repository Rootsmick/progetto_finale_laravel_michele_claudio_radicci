<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('index', ['articles' => Article::all()]);
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
        ]);
        return redirect('/');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->update([
            'name' => $request->name,
            'body' => $request->body,
        ]);
        return redirect('/');
    }
}
