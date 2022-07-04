<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @livewireStyles
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.6.0.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    @include('navbar')
    <main>
        {{$slot}}
    </main>
    @livewireScripts
    @stack('scripts')
 

{{-- <script type="text/javascript">
    window.livewire.on('showConfirmDelete', () => {
        $('#deleteModal').modal('show');
    });
    window.livewire.on('hideConfirmDelete', () => {
        $('#deleteModal').modal('hide');
    });
    window.livewire.on('showForm', () => {
                $('#showForm').modal('show');
            });
    window.livewire.on('hideForm', () => {
        $('#showForm').modal('hide');
    });
</script> --}}

@yield('script')

</body>
</html>