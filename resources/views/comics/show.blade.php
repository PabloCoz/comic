<x-app-layout>
    <div class="w-full h-auto overflow-hidden bg-teal-500">

        <div class="max-w-6xl mx-auto">
            <div class="py-10">
                <div class="block md:flex justify-center items-center space-y-5 md:space-y-0 md:space-x-5">
                    <div class="">
                        <img class="w-full h-full md:h-96 object-cover md:rounded-lg"
                            src="{{ Storage::url($comic->image->url) }}">
                    </div>
                    <div>
                        <h1 class="text-center text-3xl md:text-5xl font-bold uppercase tracking-wide text-white">
                            {{ $comic->title }}
                        </h1>
                        <p class="md:text-xl font-bold font-josefin text-white mt-3 mx-3">
                            Creado por: <a href=""
                                class="uppercase hover:underline">{{ $comic->user->username }}</a>
                        </p>
                        <div class="flex items-center justify-center space-x-5 mt-4">
                            <section class="flex items-center">
                                <button class=" bg-white rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                    </svg>
                                </button>

                                <h1 class="ml-1 text-white font-bold font-josefin">{{ $comic->users->count() }}</h1>
                            </section>

                            <section class="flex items-center">
                                <button class=" bg-white rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                </button>

                                <h1 class="ml-1 text-white font-bold font-josefin">{{ $comic->ratings->avg('value') }}
                                </h1>
                            </section>
                            <section class="flex items-center">
                                <button class=" bg-white rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>

                                <h1 class="ml-1 text-white font-bold font-josefin">{{ $comic->users->count() }}</h1>
                            </section>

                        </div>
                        {{-- <div class="flex justify-between mt-4">
                            <div>
                                @livewire('comic.comic-rating', ['comic' => $comic])
                            </div>
                            
                        </div> --}}
                        <div class="flex items-center justify-center mt-10">
                            @can('enrolled', $comic)
                                <a href="{{ route('comics.status', ['comic' => $comic, 'chapter' => $comic->chapters->first()]) }}"
                                    class="rounded-full p-3 bg-rose-600 text-white font-bold font-josefin">
                                    Leer Ahora!
                                </a>
                            @else
                                <form action="{{ route('comics.enrolled', $comic) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="rounded-full p-3 bg-rose-600 text-white font-bold font-josefin uppercase tracking-widest">
                                        Suscribirse
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="max-w-5xl mx-auto pb-2 mt-4">
        <div class="grid grid-cols-1 md:grid-cols-8 gap-3">
            <div class="col-span-6 order-2 md:order-1">
                <div class="">
                    <h1 class="text-lg uppercase tracking-wider font-bold">Capítulos:</h1>
                </div>

                <div class="mx-1 md:mx-6">
                    @foreach ($chapters as $chapter)
                        <div class="p-2 ">
                            <div class="bg-gray-200 p-2 w-full rounded-lg flex justify-between items-center">
                                <div class="flex items-center">
                                    <img src="{{ Storage::url($chapter->image) }}" class="h-20 " alt="">
                                    <h1 class="text-sm md:text-lg font-bold font-josefin">{{ $chapter->position }}.
                                        {{ $chapter->name }}
                                    </h1>
                                </div>
                                <div class="">
                                    <div class="flex items-center space-x-2">
                                        @livewire('comic.chapter-like', ['chapter' => $chapter, 'comic' => $comic])
                                        @can('enrolled', $comic)
                                            <a href="{{ route('comics.status', ['comic' => $comic, 'chapter' => $chapter]) }}"
                                                class="p-1 hover:bg-rose-500 rounded-lg hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                                </svg>

                                            </a>
                                        @endcan
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-span-2 order-1 md:order-2">
                <h1 class="text-lg uppercase tracking-wider font-bold">Descripción:</h1>
                <p class="text-gray-600 mt-2 text-justify">
                    {{ $comic->description }}
                </p>
            </div>

        </div>
    </section>
</x-app-layout>
