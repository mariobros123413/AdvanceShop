

<!DOCTYPE html>
<html lang="en">
    <head>
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
                                    
                                    <td>{{ $producto->idproducto }}</td>
                                    <td>{{ $producto->nombproducto }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-editar-{{ $producto->idproducto}}">
                                            Editar
                                        </button>
                                        <!-- Modal para editar el producto -->
                                        <div class="modal fade" id="modal-editar-{{ $producto->idproducto }}" tabindex="-1" role="dialog" aria-labelledby="modal-editar-{{ $producto->idproducto }}-titulo" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modal-editar-{{ $producto->idproducto }}-titulo">Editar Producto</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
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
</html>