<div>
    <div class="card">

        <div class="card-header">
            <input wire:keydown="clearPage" wire:model="search" class="form-control w-100" type="text"
                placeholder="Buscar...">
        </div>

        @if ($comics->count())

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Estado</th>
                                <th>Categoria</th>
                                <th>Creador</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comics as $comic)
                                <tr>
                                    <td>{{ $comic->id }}</td>
                                    <td>{{ $comic->title }}</td>
                                    <td>
                                        @switch($comic->status)
                                            @case(1)
                                                <span class="badge badge-danger">Borrador</span>
                                            @break

                                            @case(2)
                                                <span class="badge badge-warning">Revision</span>
                                            @break

                                            @case(3)
                                                <span class="badge badge-success">Publicado</span>
                                            @break

                                            @default
                                        @endswitch

                                    <td>
                                        {{ $comic->category->name }}
                                    </td>
                                    <td><b>{{ $comic->user->username }}</b></td>
                                    <td>
                                        @if ($comic->status == 2)
                                            <a href="{{ route('admin.comics.show', $comic) }}"
                                                class="btn btn-primary btn-sm">Ver</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer">
                {{ $comics->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registro</strong>
            </div>
        @endif
    </div>
</div>
