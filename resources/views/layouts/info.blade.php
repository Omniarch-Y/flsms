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
        <script src="{{ asset('js/jquery-3.6.0.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/mdb.min.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="{{ asset('css/fonts/Nunito.css') }}" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('css/body1.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/info.css') }}" rel="stylesheet">

    </head>

    <body>
        <div id="app">
            {{-- @include('navbar') --}}

            <main class="py-4">
                {{$slot}}
            </main>
        </div>
        @stack('scripts')
        @livewireScripts
    </body>
</html>
