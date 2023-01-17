<x-app-layout>
    <header class="w-full relative h-auto overflow-hidden">

        <div class="max-w-5xl mx-auto relative z-20 select-none">
            <div class="py-44">
                <h1 class="uppercase ml-5 lg:ml-0 lg:mr-40 mb-6 text-5xl lg:text-6xl font-luckiest text-white">Crea tus
                    comics y compartelo con otros</h1>
                <div class="block md:flex items-center md:space-x-3 space-y-2 md:space-y-0">
                    <a href=""
                        class="block font-josefin font-bold px-6 py-3 text-center rounded-full uppercase text-white bg-rose-600">únete
                        como lector</a>
                    <a href=""
                        class=" block font-josefin font-bold px-4 py-2 text-center rounded-full uppercase text-white bg-transparent border-2 border-white">Únete
                        como creador</a>
                </div>

            </div>
        </div>
        <div>
            <img class="absolute top-0 left-0 w-full h-full object-cover z-10 brightness-50"
                src="{{ asset('img/banner.jpg') }}">
        </div>
    </header>

    <section class="bg-rose-500 py-10">
        <div class="max-w-xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <div>
                    <img src="{{ asset('img/vector.png') }}" class="h-56 w-full object-contain">
                </div>
                <div class="flex justify-center items-center">
                    <div>
                        <h1 class="font-josefin font-extrabold text-2xl text-center text-white">¿ERES PRINCIPIANTE EN
                            LOS COMICS?</h1>
                        <div class="flex justify-center">
                            <button class="mt-4 bg-white rounded-full px-3 py-2 font-bold font-josefin uppercase">
                                Empezar aqui
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-black py-10">
        <div class="max-w-3xl mx-auto">
            <h1 class="font-josefin font-bold text-3xl text-white text-center">Empieza con 4 simples pasos</h1>
            <div
                class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-3 mt-6 divide-y-4 space-y-4 md:space-y-0 md:divide-y-0 divide-white">
                <div class>
                    <div class="flex items-center justify-center">
                        <div>
                            <img src="{{ asset('img/vector/1.svg') }}" class="h-60 w-full object-contain"
                                loading="lazy">
                            <div class="mt-3">
                                <h1 class="bg-white p-2 mx-16 text-center text-2xl font-bold font-josefin rounded-full">
                                    Paso 1</h1>
                                <p class="text-xl text-white text-center font-bold mt-5">Crea un cuenta o inicia sesión
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="">
                    <div class="flex items-center justify-center">
                        <div>
                            <img src="{{ asset('img/vector/2.svg') }}" class="h-60 w-full object-contain"
                                loading="lazy">
                            <div class="mt-3">
                                <h1 class="bg-white text-center text-2xl mx-9 p-2 font-bold font-josefin rounded-full">
                                    Paso 2</h1>
                                <p class="text-xl text-white text-center font-bold mt-5">Activa el modo creador</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-center">
                        <div>
                            <img src="{{ asset('img/vector/3.svg') }}" class="h-60 w-full object-contain"
                                loading="lazy">
                            <div class="mt-3">
                                <h1 class="bg-white p-2 mx-16 text-center text-2xl font-bold font-josefin rounded-full">
                                    Paso 3</h1>
                                <p class="text-xl text-white text-center font-bold mt-5">Crea tu comic y subo tus
                                    imagenes</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-center">
                        <div>
                            <img src="{{ asset('img/vector/4.svg') }}" class="h-60 w-full object-contain"
                                loading="lazy">
                            <div class="mt-3">
                                <h1 class="bg-white text-center text-2xl p-2 font-bold font-josefin rounded-full">Paso 4
                                </h1>
                                <p class="text-xl text-white text-center font-bold mt-5">Publica tu comic con otros</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class=" py-6 bg-black border-t-2 border-white">
        <div class="max-w-5xl mx-auto">


            <h1 class="font-luckiest text-center text-4xl text-white">
                NUESTROS COMICS YA PUBLICADOS
            </h1>
            <p class="text-white text-center font-josefin mt-4">MILES DE CREADORES YA SE ESTAN SUMANDO ¿QUE ESPERAS?</p>

            <div class="mt-6 text-white">
                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 p-2">
                    @foreach ($comics as $comic)
                        <a href="{{ route('comics.show', $comic) }}"
                            class="overflow-hidden shadow-md hover:bg- rose-500 text-white">
                            <div class="">
                                <div class="flex justify-center items-center">
                                    <img src="{{ Storage::url($comic->img) }}"
                                        class="w-full h-52 md:h-64 object-contain">
                                </div>
                                <div>
                                    <h1 class="text-sm md:text-lg font-bold font-josefin text-center">
                                        {{ Str::limit($comic->title, 30, '...') }}</h1>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center justify-center mt-10">
                <a href="{{ route('comics.index') }}"
                    class="font-josefin font-bold text-white bg-rose-500 rounded-full p-3 text-xl">
                    Ver mas comics...
                </a>
            </div>
        </div>
    </section>

    <section>
        <x-footer />
    </section>
</x-app-layout>
