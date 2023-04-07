<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
    }
    
    /**
     * Создать панель навигации
     *
     * @return void
     */
    private function composeNavigation()
    {
        // view()->composer('partials.navAndAuth', 'App\Http\Composers\NavigationComposer');
        view()->composer('partials.navAndAuth', function($view){
            $view->with('latest', Article::latest('published_at')->published()->first());
        });
    }
}
