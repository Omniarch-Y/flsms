<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>FLSMS</title>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js') }}" defer></script>

        {{-- <script src="{{ asset('js/mdb.min.js') }}" defer></script> --}}
        <script src="{{ asset('js/app.js') }}" defer></script>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> --}}
        {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"> --}}
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"> --}}
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
        <link href="{{ asset('css/Nunito-VariableFont_wght.ttf') }}" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">

    </head>

    <body class="sidebar-mini layout-fixed">

        {{-- @include('navbar') --}}

        <main>
            {{ $slot }}
        </main>

        @stack('scripts')
        @livewireScripts

    </body>
</html>
