<div>
    <div class="max-w-5xl mx-auto py-10">
        <div>
            <h1 class="text-3xl font-bold text-center">Mis comics favoritos</h1>
            <div class="mt-10">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                    @foreach ($comics as $comic)
                        <a href="{{route('comics.show', $comic)}}" class="overflow-hidden bg-white shadow-md rounded-lg">
                            <div class="px-2 py-6">
                                <img src="{{Storage::url($comic->image->url)}}" class="rounded-lg">
                                <div class="mt-1">
                                    <h1 class="text-xl font-bold text-center font-josefin">{{$comic->title}}</h1>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
