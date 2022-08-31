<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('vote', 'DESC')->get();
        return view('dashboard', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        Article::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        return back()->with('success', 'Successfully added to the database');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $article->name = $request->name;
        $article->description = $request->description;
        $article->save();

        return back()->with('success', 'Successfully udpated');
    }

    public function delete(Article $article)
    {
        $article->delete();
        return back();
    }

    public function upvote(Article $article)
    {
        $article->vote += 1;
        $article->save();
        return back();
    }
}
