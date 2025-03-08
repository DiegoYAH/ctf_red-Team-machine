<!doctype html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="Blanxart, salud">
    <meta name="author" content="Blanxart">
    <meta name="keywords" content="Blanxart, salud">
    <meta name="description" content="@yield('descripcion_pagina')">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('descripcion_pagina')">
    <meta property="og:type" content="website">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dda3477dd5.js" crossorigin="anonymous"></script>
    @vite(['resources/sass/main.scss','resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title')</title>
</head>

<body>
    {{-- @dd(auth()->user()->id); --}}
    @include('partials.header')
    <div id="app">
        
        <navegacion-component :user-data="{{ json_encode(auth()->user()) }}"></navegacion-component>

    </div>

    <div class="allContent">
        @yield('content')
    </div>

    @include('partials.footer')
</body>

</html>