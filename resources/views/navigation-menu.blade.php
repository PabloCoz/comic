<nav x-data="{ open: false }" class="bg-black pb-2 md:pb-0">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img class="h-12 w-12 object-contain" src="{{ asset('img/logo.png') }}" alt="">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 md:flex justify-center items-center">
                    <a href="{{ route('home') }}"
                        class="text-white uppercase text-sm hover:border-b-2 p-2 tracking-widest font-bold hover:border-rose-500 @routeIs('home') border-b-2 border-rose-500 @endif">
                        Inicio</a>
                    <a href="{{ route('comics.index') }}"
                        class="text-white uppercase text-sm hover:border-b-2 p-2 tracking-widest font-bold hover:border-rose-500 @routeIs('comics.index') border-b-2 border-rose-500 @endif">
                        Comics</a>
                    <a href="{{ route('home') }}"
                        class="text-white uppercase text-sm hover:border-b-2 p-2 tracking-widest font-bold hover:border-rose-500">
                        Nosotros</a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                @auth
                    <div class="flex items-center justify-center space-x-3">
                        <div>
                            @if (auth()->user()->is_creator == false)
                                <a href="{{ route('active') }}"
                                    class="text-white uppercase text-sm bg-green-600 font-bold p-2 rounded-full">
                                    PUBLICAR YA!!</a>
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('comics.user') }}"
                                class="bg-rose-600 text-white font-josefin font-bold p-3 rounded-full uppercase text-sm">
                                Mis comics favoritos
                            </a>
                        </div>
                        <div class="ml-3 relative">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                src="{{ Auth::user()->profile_photo_url }}"
                                                alt="{{ Auth::user()->name }}" />
                                        </button>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>
                                    @can('creator', auth()->user())
                                        <x-jet-dropdown-link href="{{ route('creator.comics.index') }}">
                                            Panel de creador
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @can('Ver Dashboard (administrador)')
                                        <x-jet-dropdown-link href="{{ route('admin') }}">
                                            Panel de administrador
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    </div>
                @else
                    @livewire('modals')

                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-white mx-2 rounded-lg p-2">
        <div class="space-y-2">
            <a href="{{ route('home') }}"
                class="block pl-2 border-l-4 @routeIs('home') border-rose-600 @endif">Inicio</a>
            <a href="{{ route('comics.index') }}"
                class="block pl-2 border-l-4 @routeIs('comics.index') border-rose-600 @endif">Comics</a>
            <a href="{{ route('home') }}"
                class="block pl-2 border-l-4 @routeIs('home') border-rose-600 @endif">Nosotros</a>
        </div>
        <hr class="my-4">
        @auth
            <div class="space-y-2">
                @can('Ver Dashboard (administrador)')
                    <a href="{{ route('admin') }}" class="block pl-2 border-l-4 @routeIs('admin') border-rose-600 @endif">Panel
                        de administrador</a>
                @endcan
                @can('creator', auth()->user())
                    <a href="{{ route('creator.comics.index') }}"
                        class="block pl-2 border-l-4 @routeIs('creator.comics.index') border-rose-600 @endif">Panel de creador</a>
                @endcan
                <a href="{{ route('comics.user') }}"
                    class="block pl-2 border-l-4 @routeIs('comics.user') border-rose-600 @endif">Mis comics favoritos</a>
            </div>
            <div class="flex items-center justify-between mt-3">
                <div class="flex items-center">
                    <img src="{{ auth()->user()->profile_photo_url }}"
                        class="h-9 w-9 rounded-full object-center object-contain">
                    <h1 class="ml-2">{{ auth()->user()->username }}</h1>
                </div>

                <div>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <button type="submit" class="bg-red-600 text-white font-bold p-2 rounded-full">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
            <div class="flex items-center justify-center mt-5">
                @if (auth()->user()->is_creator == false)
                    <a href="{{ route('active') }}"
                        class="text-white w-full text-center uppercase text-sm bg-green-600 font-bold p-2 rounded-full">
                        PUBLICAR YA!!</a>
                @endif
            </div>
        @else
            <div class="flex items-center justify-center space-x-2">
                <a href="{{ route('login') }}" class="bg-rose-600 p-2 rounded-full text-white font-bold">Iniciar Sesion</a>
                <a href="{{ route('register') }}" class="p-2 underline rounded-full font-bold">Registrarse</a>
            </div>

        @endauth
    </div>
</nav>
