<div>
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
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Productos</h3>
                    </div>
                    <div class="panel-body">
                        <a href="{{ route('productos.pdf') }}" class="btn btn-primary">Imprimir PDF</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pedidos</h3>
                    </div>
                    <div class="panel-body">
                        <a href="{{ route('pedidos.pdf') }}" class="btn btn-primary">Imprimir PDF</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Categorías</h3>
                    </div>
                    <div class="panel-body">
                        <a href="{{ route('categorias.pdf') }}" class="btn btn-primary">Imprimir PDF</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Usuarios</h3>
                    </div>
                    <div class="panel-body">
                        <a href="{{ route('usuarios.pdf') }}" class="btn btn-primary">Imprimir PDF</a>
                    </div>
                </div>
            </div>
        </div>
    @stop
</div>
