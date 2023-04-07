<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{    
    /**
     * Показ статей по определенному тегу
     *
     * @param  mixed $tag
     * @return \Illuminate\View\View 
     */
    public function show(Tag $tag): \Illuminate\View\View
    {
        $articles = $tag->articles()->latest('published_at')->published()->simplePaginate(6);
        
        return view('articles.index')->with([
            'articles'=>$articles,
            'nameTag'=>$tag->name
        ]);
    }
}
