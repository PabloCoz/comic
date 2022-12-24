@extends('adminlte::page')

@section('title', 'Panel de Comics')

@section('content_header')
    <h1>Comics</h1>
@stop

@section('content')
    @livewire('admin.comics-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop