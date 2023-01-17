@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Crear Categorias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de la categoria']) !!}
            </div>

            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group">
                {!! Form::label('slug', 'Slug de la categoria') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}
            </div>

            @error('slug')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        document.getElementById("name").addEventListener('keyup', slugChange);

        function slugChange() {

            name = document.getElementById("name").value;
            document.getElementById("slug").value = slug(name);

        }

        function slug(str) {
            var $slug = '';
            var trimmed = str.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        }
    </script>

@stop
