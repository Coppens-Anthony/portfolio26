<!doctype html>
<html lang="{!! App::getLocale() !!}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Anthony Coppens">
    <meta name="keywords"
          content="Développement, web, design, portfolio, cv, agence, freelance, infographie, hepl, hannut, orp-jauche">
    <meta name="description" content="Portfolio de développeur web">
    <link rel="icon" href="{{ asset('assets/svg/logo.svg') }}">
    <title>{{ config('app.name', 'Portfolio - Anthony Coppens') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="overflow-x-hidden font-sans text-black bg-background">
<h1 class="sr-only">{{ $title }}</h1>
<x-public.header/>
<main>
    {{ $slot }}
</main>
<x-public.footer/>
</body>
</html>
