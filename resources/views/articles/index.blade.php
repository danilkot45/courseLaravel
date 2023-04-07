@extends('layouts.app')

@section('content')
    <div class="container mt-3 " style="padding:0;">
        <div class="d-flex row">
            @if (isset($nameTag))
                <h1 class="row text-warning justify-content-center" style="font-weight:bold; margin:0 auto;">Статьи по тегу:
                    {{ $nameTag }}</h1>
                <h3 class="row text-warning justify-content-center" style="margin:0 auto;">Кто ищет, тот всегда найдет!</h3>
            @else
                <h1 class="row text-warning justify-content-center" style="font-weight:bold; margin:0 auto;">Множество
                    интересных
                    статей</h1>
                <h3 class="row text-warning justify-content-center" style="margin:0 auto;">Напиши свою интересную статью!
                </h3>
                <a href="{{ url('/articles/create') }}" class='btn btn-white text-warning mt-3  font-bold'
                    style=" border: 2px solid #ffc107; font-weight:bold; width:400px; margin:0 auto">Написать статью</a>
            @endif
        </div>
    </div>
    <div class="row align-item-center justify-content-center mt-3">
        @foreach ($articles as $article)
            <div class="col-md-3 mb-3 me-2 pb-3" style="border:2px solid #ffc107; border-radius:15px;background:#254c3c;">
                <article>
                    <h2>
                        <a href="{{ url('/articles', $article->id) }}" class="text-warning"
                            style="text-decoration:none">{{ $article->title }}</a>
                    </h2>
                    <hr class="text-black">
                    <div class="time text-warning" style=" display:flex; ">{{ $article->published_at }}</div>
                </article>
            </div>
        @endforeach
        <nav class="flex">
            <ul class="pagination justify-content-center">
                <li>{{ $articles->links() }}</li>
            </ul>
        </nav>
    </div>
    </div>
@endsection
