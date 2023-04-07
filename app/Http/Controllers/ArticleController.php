<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PublishOrUpdateArticleRequest;
use App\Services\articleService;
use Illuminate\Auth\Events\Validated;

class ArticleController extends Controller
{
    /**
     * Проверка если пользователь авторизован
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit', 'update']]);
    }

    /**
     * Показать все статьи
     *
     * @return \Illuminate\View\View
     */
    public function index(articleService $articleService): \Illuminate\View\View
    {
        return $articleService->index();
    }

    /**
     * Создание статьи
     *
     * @return \Illuminate\View\View
     */
    public function create(Article $article, articleService $articleService): \Illuminate\View\View
    {
        return $articleService->create($article);
    }

    /**
     * Сохранение новой статьи 
     *
     * @param  mixed $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PublishOrUpdateArticleRequest  $request, articleService $articleService): \Illuminate\Http\RedirectResponse
    {
        return $articleService->store($request);
    }

    /**
     * Показ конкретной статьи
     *
     * @param  mixed $id
     * @return \Illuminate\View\View
     */
    public function show(Article $article, articleService $articleService): \Illuminate\View\View
    {
        return $articleService->show($article);
    }

    /**
     * Редактирование статьи
     *
     * @param  mixed $id
     * @return \Illuminate\View\View
     */
    public function edit(Article $article, articleService $articleService): \Illuminate\View\View
    {
        return $articleService->edit($article);
    }

    /**
     * Обновление статьи
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Article $article, PublishOrUpdateArticleRequest  $request, articleService $articleService): \Illuminate\Http\RedirectResponse
    {
        return $articleService->update($article, $request);
    }
}
