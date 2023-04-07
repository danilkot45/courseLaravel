<?php

namespace App\Http\Composers;

use App\Models\Article;

class NavigationComposer
{
    public function compose($view)
    {
            $view->with('latest', Article::latest('published_at')->published()->first());
    }
}