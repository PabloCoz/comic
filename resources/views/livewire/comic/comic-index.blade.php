<div>
    <div class="max-w-6xl mx-auto mt-4">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
            <div class="px-4">
                <h1 class="text-xl font-josefin uppercase">Filtros</h1>
                <div class="mt-8">
                    <input type="text" class="w-full rounded-full" placeholder="Buscar..." wire:keydown="clearPage" wire:model="search" >
                </div>
                <div class="mt-3" x-data="{ cat: false }">
                    <button @click="cat=!cat"
                        class="flex items-center justify-between w-full p-2 rounded-lg bg-gray-300">
                        <h1 class="text-lg font-bold font-josefin">Categorias</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>

                    </button>
                    <ul class="mx-4" x-show="cat">
                        @foreach ($this->categories as $category)
                            <li>
                                <label for="{{ $category->id }}">
                                    <input type="checkbox" wire:model="cate.{{ $category->id }}"
                                        id="{{ $category->id }}" class="text-rose-600 bg-gray-100 rounded focus:ring-0">
                                    {{ $category->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mt-5">
                    <button wire:click="resetFilter"
                        class="bg-rose-600 text-white font-josefin uppercase p-3 rounded-full text-sm font-bold">
                        Limpiar Filtro
                    </button>
                </div>
            </div>

            <div class="col-span-3 col-start-2 mt-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($comics as $item)
                        <a href="{{ route('comics.show', $item) }}"
                            class="overflow-hidden bg-white rounded-lg shadow-md hover:bg-rose-500 hover:text-white">
                            <div class="p-2">
                                <div>
                                    <img src="{{ Storage::url($item->image->url) }}" class="rounded-lg">
                                </div>
                                <div>
                                    <h1 class="text-lg font-bold font-josefin">{{ $item->title }}</h1>
                                    <p class="text-sm">{{ Str::limit($item->description, 30) }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div>
                    {{ $comics->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
