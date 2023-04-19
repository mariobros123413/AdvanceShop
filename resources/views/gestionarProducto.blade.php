<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layouts.adminlte')
</head>
<body>
    @section('content')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Productos</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-editar-{{ $producto->id }}">
                                        Editar
                                    </button>
                                    <!-- Modal para editar el producto -->
                                    <div class="modal fade" id="modal-editar-{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-editar-{{ $producto->id }}-titulo" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modal-editar-{{ $producto->id }}-titulo">Editar Producto</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Formulario para editar el producto -->
                                                    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="nombre">Nombre del Producto</label>
                                                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="precio">Precio del Producto</label>
                                                            <input type="number" name="precio" id="precio" class="form-control" value="{{ $producto->precio }}" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</body>
</HTML>