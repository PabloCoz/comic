<x-creator-layout :comic="$comic">
    <div class="">
        {!! Form::model($comic, ['route' => ['creator.comics.update', $comic], 'method' => 'put', 'files' => true]) !!}
        @include('creator.comics.partials.form')

        <div class="flex justify-end mt-3">
            {!! Form::submit('Actualizar', ['class' => 'rounded-full text-white bg-green-600 font-bold p-2']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <x-slot name="js">
        <script src="{{asset('js/form.js')}}"></script>
    </x-slot>
</x-creator-layout>
