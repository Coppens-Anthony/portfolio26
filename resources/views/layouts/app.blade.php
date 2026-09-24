<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/svg/logo.svg') }}">
    <title>{{ $title ?? config('app.name') . ' --- Administration' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="overflow-x-hidden mx-auto font-sans text-black">
<header>
    <div class="flex justify-between items-center py-8 px-16 max-w-7xl mx-auto">
        <div class="relative w-fit z-250">
            <a href="{{ route('dashboard') }}" aria-label="Accueil" class="absolute inset-0 w-full h-full"></a>
            <img src="{{ asset('assets/svg/logo.svg') }}" alt="">
        </div>

        <nav
            id="main-navigation"
            aria-label="Navigation principale"
            class="w-fit">
            <h2 class="sr-only">Navigation principale</h2>

            <ul class="flex flex-col md:flex-row gap-8 p-6 md:p-0 text-center">
                <li>
                    <x-global.link
                        :route="route('dashboard')"
                        :isActive="request()->routeIs('dashboard')">
                        Dashboard
                    </x-global.link>
                </li>
                <li>
                    <x-global.link
                        :route="route('competencies.index')"
                        :isActive="request()->routeIs('competencies.*')">
                        Compétences
                    </x-global.link>
                </li>
                <li>
                    <x-global.link
                        :route="route('projects.index')"
                        :isActive="request()->routeIs('projects.*')">
                        Projets
                    </x-global.link>
                </li>
                <li>
                    <x-global.link
                        :route="route('scholar.index')"
                        :isActive="request()->routeIs('scholar.*')">
                        Parcours
                    </x-global.link>
                </li>
                <li>
                    <x-global.link
                        :route="route('profile')"
                        :isActive="request()->routeIs('profile')">
                        Profil
                    </x-global.link>
                </li>
            </ul>
        </nav>
    </div>
</header>
<main class="max-w-7xl my-16 mx-16">
    <h1 class="sr-only">{{ $title }}</h1>
    {{ $slot }}
</main>
<livewire:widgets::modal/>
</body>
</html>
