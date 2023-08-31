<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dundie Library</title>
    <link rel="icon" type="image/x-icon" href="/images/dundie_library_logo.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite('resources/js/app.js')

    <!-- Conteúdo específico de cada página para tag head -->
    @yield('head')
</head>
<body>
    <div id="app">
        <header-comp></header-comp>
        <div class="min-h-screen flex flex-col sm:pt-0 bg-gray-100">
            @yield('content')
        </div>
        <footer-comp></footer-comp>
    </div>
</body>
</html>