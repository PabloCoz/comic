<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,700;1,200;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">


    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')
        <!-- Page Heading -->
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-5 gap-6 py-4">
            <aside>
                <h1 class="font-bold text-lg mb-4">EDITOR</h1>

                <ul class="text-sm">
                    <li class="leading-7 mb-1 border-l-4 pl-2 @routeIs('creator.comics.edit', $comic) border-rose-600 @endif">
                        <a href="{{ route('creator.comics.edit', $comic) }}">Información General</a>
                    </li>
                    <li class="leading-7 mb-1 border-l-4 pl-2 @routeIs('creator.comics.chapter', $comic) border-rose-600 @endif">
                        <a href="{{ route('creator.comics.chapter', $comic) }}">Capítulos</a>
                    </li>
                    <li class="leading-7 mb-1 border-l-4 pl-2">
                        <a href="">Detalles extras</a>
                    </li>
                </ul>
            </aside>
            <div class="md:col-span-4 overflow-hidden bg-white rounded-lg shadow-md">
                <main class="px-4 py-6">
                    {{ $slot }}
                </main>
            </div>
        </div>

    </div>

    @stack('modals')

    @livewireScripts
    @stack('sortable')
    @isset($js)
        {{ $js }}
    @endisset


</body>

</html>
