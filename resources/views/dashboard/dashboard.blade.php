@extends('adminlte::page')

@section('title', 'El mejor lugar!')

@section('content_header')
    <h1>Panel del Administrador</h1>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop
@section('content')
    <p>Bienvenido al panel del Administrador</p>
    @livewire('gestionar-productos')
    

@stop


<div>

</div>
@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
