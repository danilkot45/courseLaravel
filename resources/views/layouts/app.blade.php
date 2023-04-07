<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .nav-link {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            display: inline-block;
            color: #ff6000;
            line-height: 1;
            text-decoration: none;
            cursor: pointer;
            position: relative;
        }

        .nav-link:after {
            display: block;
            content: "";
            color: #ff6000;
            background-color: #ff6000;
            height: 3px;
            width: 0%;
            left: 50%;
            position: absolute;
            transition: width 1s ease-in-out;
            transform: translateX(-50%);
        }

        .nav-link:hover:after,
        .nav-link:focus:after {
            color: #ff6000;
            width: 100%;
        }

        body {
            padding: 0;
            margin:0;
            background-image: url(https://phonoteka.org/uploads/posts/2022-01/1642435320_6-phonoteka-org-p-fon-dlya-prezentatsii-zelenii-barkhat-kras-6.jpg);
            /* background-color: black; */
            background-repeat: repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
</head>

<body>
    <div id="app">
        @include('partials.navAndAuth')
        <div class="flash" style="height:60px">
            {{-- @include('partials.flash') --}}
            @include('flash::message')
        </div>
        <main class="py-4">
            @yield('content')
        </main>
        @yield('footer')
    </div>
    <script>
        $(document).ready(function() {
            $('.alert').not('.alert-important').delay(3000).slideUp(300);
        });
    </script>
</body>

</html>
