<x-app-layout>
    <header class="w-full relative h-96">
        <img class="w-full h-full object-cover z-10 brightness-50" src="{{ asset('img/banner.jpg') }}">
    </header>
    <section class="bg-black">
        <div class="max-w-5xl mx-auto pb-2">
            <div class="grid grid-cols-1 md:grid-cols-5 lg:grid-cols-7 gap-5">
                <div class="col-span-1 md:col-span-2 -mt-12 relative z-20">
                    <div class="flex justify-center">
                        <img class="h-52 w-52 rounded-full object-cover object-center"
                            src="{{ $user->profile_photo_url }}" alt="" loading="lazy">
                    </div>
                    <div class="flex justify-center mt-5">
                        <div class="w-full">
                            @auth
                                @if ($user->id != auth()->user()->id)
                                    <button class="p-3 bg-sky-400 rounded-full font-bold w-full">
                                        Suscribirse
                                    </button>
                                @endif
                                @if ($user->profile->is_original == 3)
                                    <form action="{{ route('users.original', $user) }}">
                                        @csrf
                                        <button type="submit"
                                            class="p-3 bg-red-400 rounded-full font-bold w-full text-white">
                                            Solicitar ser usuario original
                                        </button>
                                    </form>
                                @endif

                                @if (auth()->user()->id == $user->id)
                                    <a href="{{ route('profile.show') }}">
                                        <button class="p-3 bg-gray-700 text-white rounded-full font-bold w-full mt-4">
                                            Perzonalizar perfil
                                        </button>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                    <article class="mt-8">
                        <h1 class="text-white font-bold font-josefin text-xl uppercase text-center md:text-left">
                            Redes sociales
                        </h1>
                        <div class="mt-5 space-x-3 flex justify-center items-center">
                            <a href="{{ $user->profile->facebook }}"
                                class="bg-blue-600 px-3 py-2 text-white font-bold font-josefin text-xl rounded-full">Facebook</a>
                            <a href="{{ $user->profile->instagram }}"
                                class="bg-gradient-to-r from-pink-600 via-red-500 to-yellow-500 px-3 py-2 text-white font-bold font-josefin text-xl rounded-full">Instagram</a>
                        </div>
                    </article>
                    <article class="mt-8">
                        <h1 class="text-white font-bold font-josefin text-xl uppercase text-center md:text-left">
                            Comics Destacados
                        </h1>
                        <div>
                            <ul class="mt-5">
                                @if ($user->profile->is_original == true)
                                    @if ($user->comics_created->first()->status == 3)
                                        <div>
                                            <div class="flex justify-center items-center">
                                                <img src="{{ Storage::url($user->comics_created->first()->img) }}"
                                                    class="w-full h-64 object-cover object-center rounded-lg"
                                                    loading="lazy">
                                            </div>
                                            <div class="mt-2">
                                                <h1
                                                    class="text-white font-bold font-josefin text-lg text-center uppercase">
                                                    {{ $user->comics_created->first()->title }}
                                                </h1>
                                            </div>

                                        </div>
                                    @endif
                                @else
                                    @if ($user->comics_created->first()->status == 3)
                                        <div>
                                            <div class="flex justify-center items-center">
                                                <img src="{{ Storage::url($user->comics_created->first()->img) }}"
                                                    class="w-44 h-64 object-cover object-center rounded-lg"
                                                    loading="lazy">
                                            </div>
                                            <div class="mt-2">
                                                <h1
                                                    class="text-white font-bold font-josefin text-lg text-center uppercase">
                                                    {{ $user->comics_created->first()->title }}
                                                </h1>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                            </ul>
                        </div>
                    </article>
                </div>
                <div class="col-span-1 md:col-span-3 lg:col-span-5">
                    <div class="p-2 mt-5">
                        <h1 class="text-center font-bold text-white font-josefin uppercase text-xl md:text-left">Bio
                        </h1>
                        <p class="text-white text-justify">
                            {{ $user->profile->bio }}
                        </p>
                    </div>
                    <hr class="my-3">
                </div>
            </div>
        </div>
    </section>
</x-app-layout>