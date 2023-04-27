@extends('adminlte::page')

@section('title', 'El mejor lugar!')

@section('content_header')
    <h1>Panel del Administrador</h1>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
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
