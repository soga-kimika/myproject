<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Include AdminLTE CSS -->
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div class="container">
        @include('partials.errors') <!-- Include error messages -->
        @yield('content')
    </div>
    <!-- Include jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Include Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Include AdminLTE JS -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    @yield('js')
</body>
</html>
