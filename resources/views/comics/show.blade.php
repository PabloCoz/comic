<x-app-layout>
    <div class="w-full relative h-auto overflow-hidden">

        <div class="max-w-6xl mx-auto relative z-20">
            <div class="py-40">
                <h1 class="text-center text-3xl md:text-5xl font-bold font-luckiest tracking-wide text-white">
                    {{ $comic->title }}
                </h1>
                <p class="md:text-xl font-bold font-josefin text-white mt-3 mx-3">
                    Creado por: <a href="" class="uppercase hover:underline">{{ $comic->user->username }}</a>
                </p>
            </div>
        </div>
        <div>
            <img class="absolute top-0 left-0 w-full h-full object-cover z-10 brightness-50"
                src="{{ Storage::url($comic->image->url) }}">
        </div>
    </div>

    <section class="max-w-5xl mx-auto -mt-10 relative z-20 pb-2">
        <div class="overflow-hidden rounded-lg shadow-md bg-white">
            <div class="px-4 py-6">
                <div>
                    <h1 class="text-lg uppercase tracking-wider font-bold">Descripción:</h1>
                    <p class="text-gray-600 mt-2">
                        {{ $comic->description }}
                    </p>
                </div>
                <div class="my-4">
                    <div class="flex items-center justify-between">
                        @can('enrolled', $comic)
                            <a href="{{ route('comics.status', ['comic' => $comic, 'chapter' => $comic->chapters->first()]) }}"
                                class="rounded-full p-3 bg-rose-600 text-white font-bold font-josefin">
                                Leer Ahora!
                            </a>
                        @else
                            <form action="{{ route('comics.enrolled', $comic) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="rounded-full p-3 bg-rose-600 text-white font-bold font-josefin">
                                    Adquierelo Ya!
                                </button>
                            </form>
                        @endcan
                        <div>
                            @livewire('comic.comic-rating', ['comic' => $comic])
                        </div>
                    </div>
                </div>
                <div class="my-7">
                    <h1 class="text-lg uppercase tracking-wider font-bold">Capítulos:</h1>
                </div>

                <div class="mx-6">
                    @foreach ($chapters as $chapter)
                        <div class="p-2 ">
                            <div class="bg-gray-200 p-2 w-full rounded-lg flex justify-between items-center">
                                <h1 class="text-lg font-bold font-josefin">{{ $chapter->position }}. {{ $chapter->name }}
                                </h1>
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
        </div>
    </section>
</x-app-layout>
