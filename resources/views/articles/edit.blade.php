@extends('layouts.app')

@section('content')
    <div class="container pt-4 pb-4" style="background-color:white; border:2px solid white; border-radius:15px;">
        @if (isset($selected))
            <h1 class="text-warning">Редактирование статьи</h1>
            <h3 class="text-warning">Статья для редактирования: "{{ $article->title }}"</h3>
            <hr class="text-warning">
            <form action="{!! url('/articles', $article->id) !!}" method="POST">
                @method('PATCH')
            @else
                <h1>Создание новой статьи</h1>
                <form action="{{ url('/articles') }}" method="POST">
        @endif
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label ">Название статьи</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $article->title ?? '') }}">

            @error('title')
                <div class="alert alert-danger">{{ $errors->first('title') }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label ">Текст</label>
            <textarea type="text" class="form-control @error('body') is-invalid @enderror" id="body" name="body">{{ old('body', $article->body ?? '') }}</textarea>

            @error('body')
                <div class="alert alert-danger">{{ $errors->first('body') }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="published_at" class="form-label ">Дата публикации</label>
            <input type="date" class="form-control" id="published_at" name="published_at"
                value="{{ Carbon\Carbon::parse(old('published_at'))->format('Y-m-d') }}">


        </div>
        <div class="mb-3 ">
            <label for="tag_list" class="form-label ">Теги</label>

            <select class="js-example-basic-multiple form-control" name="tag_list[]" id="tag_list" multiple="multiple">
                @foreach ($tags as $key => $value)
                        <option value="{{ $key }}"
                           @if(isset($selected)) {{  $selected->has($key) || collect(old('tag_list'))->contains($key) ? 'selected' : ''}} @else {{ collect(old('tag_list'))->contains($key) ? 'selected' : ''}} @endif>
                            {{ $value }}
                        </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Сохранить</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: 'Выберите тег (необязательно)'
            });
        });
    </script>
@endsection
