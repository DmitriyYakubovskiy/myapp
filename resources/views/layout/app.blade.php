<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Динопедия')</title>

    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">

    @include('partials.header')

    <main class="main flex-grow-1 py-4">
        @yield('content')
    </main>

    @include('partials.footer')

    @include('partials.dino-modal')
    @include('partials.toast')

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/modal-navigation.js') }}"></script>
</body>
</html>
