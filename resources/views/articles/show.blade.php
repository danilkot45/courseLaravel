@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row d-flex">
            <div class="row ">
                <h1 class="mb-3 text-white" style="font-weight:bold">{{ $article->title }}</h1>
                <h4 class="author text-white">Статью опубликовал: {{ $author }}</h4>
                <h6 class="time text-white">Опубликовано {{ $wherePublished }}</h6>
                <hr>
                @if ($article->tags->isNotEmpty())
                    <div class="tags d-flex align-items-center">
                        <h5 class="text-white" style="margin-top:7px;font-weight:bold;">Теги: </h5>
                        @foreach ($article->tags as $tag)
                            <a href="{{ url('/tags', $tag->name) }}"class="btn btn-warning mx-2 ">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                @endif
                <p class="mt-5" style="padding:15px;font-weight:bold;background-color:white;line-height:32px;border: 2px solid rgb(255,193,3);
                border-radius: 5px;">{{ $article->body }}</p>
            </div>
        </div>
    </div>
@endsection
