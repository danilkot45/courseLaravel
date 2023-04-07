<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;


class articleService
{    

    public function index()
    {
        $articles = Article::latest('published_at')->published()->simplePaginate(6);
        return view('articles.index')->with('articles', $articles);
    }
    

    public function create($article)
    {
        $tags = Tag::pluck('name', 'id');
        return view('articles.edit')->with([
            'article' => $article,
            'tags' => $tags
        ]);
    }    

    public function store($request)
    {
        $article = Auth::user()->articles()->create($request->validated());//REQUEST
        $article->tags()->attach($request->input('tag_list'));
        flash()->success(__('locale.successCreateArticle'));
        return redirect('articles');
    }
    

    public function show($article)
    {
        $author = $article->user->name;
        $wherePublished = $article->published_at->diffForHumans();
        return view('articles.show')->with([
            'article' => $article, 
            'wherePublished' => $wherePublished,
            'author' => $author,
            'tags' => $article->load('tags')
        ]);
    }
    

    public function edit($article)
    {
        $tags = Tag::pluck('name','id');
        $selected = $article->load('tags')->pluck('id')->flip();///LOAD
        return view('articles.edit')->with([
            'article' => $article,
            'selected' => $selected,
            'tags' => $tags
        ]);
    }
    

    public function update($article,$request)
    {
        $article->update($request->validated());
        $article->tags()->sync($request->input('tag_list'));
        return redirect('articles');
    }
}
