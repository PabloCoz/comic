<div>
    <div class="card">

        <div class="card-header">
            <input wire:keydown="clearPage" wire:model="search" class="form-control w-100" type="text"
                placeholder="Buscar...">
        </div>

        @if ($users->count())

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre de Usuario</th>
                                <th>Creador</th>
                                <th>Original</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        @if ($user->is_creator)
                                            <span class="badge badge-success">Es creador</span>
                                        @else
                                            <span class="badge badge-danger">No es creador</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->profile)
                                            @switch($user->profile->is_original)
                                                @case(0)
                                                    <span class="badge badge-primary">NO</span>
                                                @break

                                                @case(1)
                                                    <span class="badge badge-warning">SI</span>
                                                @break

                                                @default
                                            @endswitch
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->status)
                                            <span class="badge badge-success">Activo</span>
                                        @else
                                            <span class="badge badge-warning">Suspendido</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->status)
                                            <button wire:click="banear({{ $user->id }})" class="btn btn-danger"
                                                type="submit">SUSPENDER</button>
                                        @else
                                            <button wire:click="activar({{ $user->id }})" class="btn btn-success"
                                                type="submit">ACTIVAR</button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->profile && $user->profile->is_original == 2)
                                            <button wire:click="original({{ $user->id }})" class="btn btn-success"
                                                type="submit">ORIGINAL</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registro</strong>
            </div>
        @endif
    </div>
</div>
