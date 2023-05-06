<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    </div>
    <style>
        .flexasd {
            display: flex;
            background: #830510;
            color: #ddd;
            padding: 5px;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        /* Estilos para el input */
        .input {
            padding: 0.5rem 1rem;
            border: 1px solid #d2d6dc;
            border-radius: 0.25rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #684a4c;
        }

        .input:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.3);
        }

        .w-full {
            width: 100%;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th,
        td {
            padding: 0.5rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f1f1f1;
        }

        tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        .table tr:nth-child(even) {
            background-color: #EDF2F7;
        }

        .table td button {
            background-color: #4299E1;
            color: #FFFFFF;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .table td button:hover {
            background-color: #3182CE;
        }

        .modal-body form div {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }
    </style>
    <?php
    $producto = $productos;
    ?>
    <div class="px-6 py-y4 flexasd">
        <input type="text" wire:model="search" class="w-full" placeholder="Búsqueda por Nombre y Descripción">
        @include('livewire.create-producto')
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class="cursor-pointer" wire:click="order('marca')">Marca</th>
                <th class="cursor-pointer" wire:click="order('nombproducto')">Nombre</th>
                <th class="cursor-pointer" wire:click="order('precio')">Precio ($)</th>
                <th class="cursor-pointer" wire:click="order('descripcion')">Descripcion</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->marca }}</td>
                    <td>{{ $producto->nombproducto }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->idcategoria }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-editar-{{ $producto->idproducto }}">
                            Editar
                        </button>
                        <!-- Modal para editar el producto -->
                        <div class="modal fade" id="modal-editar-{{ $producto->idproducto }}" tabindex="-1"
                            role="dialog" aria-labelledby="modal-editar-{{ $producto->idproducto }}-titulo"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-editar-{{ $producto->idproducto }}-titulo">
                                            Editar Producto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulario para editar el producto -->
                                        <form method="POST"
                                            action="{{ route('editar.producto', $producto->idproducto) }}">
                                            @csrf
                                            <div>
                                                <label for="nombproducto">Nombre del producto: </label>
                                                <input type="text" name="nombproducto"
                                                    value="{{ $producto->nombproducto }}">
                                            </div>
                                            <div>
                                                <label for="nombproducto">Descripción: </label>
                                                <input type="text" name="descripcion"
                                                    value="{{ $producto->descripcion }}">
                                            </div>
                                            <div>
                                                <label for="nombproducto">Precio: </label>
                                                <input type="text" name="precio" value="{{ $producto->precio }}">
                                            </div>
                                            <div>
                                                <label for="nombproducto">Marca: </label>
                                                <input type="text" name="marca" value="{{ $producto->marca }}">
                                            </div>
                                            <div>
                                                <label for="nombproducto">Categoría: </label>
                                                <input type="text" name="idcategoria"
                                                    value="{{ $producto->idcategoria }}">
                                            </div>
                                            <div>
                                                <label for="precio">Stock: </label>
                                                <input type="number" name="stock" value="{{ $producto->stock }}">
                                            </div>
                                            <button type="submit">Guardar cambios</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-eliminar-{{ $producto->idproducto }}">
                            Eliminar
                        </button>
                        <!-- Modal para editar el producto -->
                        <div class="modal fade" id="modal-eliminar-{{ $producto->idproducto }}" tabindex="-1"
                            role="dialog" aria-labelledby="modal-editar-{{ $producto->idproducto }}-titulo"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-eliminar-{{ $producto->idproducto }}-titulo">
                                            Eliminar Producto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulario para editar el producto -->
                                        <form method="POST"
                                            action="{{ route('eliminar.producto', $producto->idproducto) }}">
                                            @csrf
                                            <div>
                                                <label for="nombproducto">Estás seguro de Eliminar este Producto? </label>
                                            </div>
                                            <button type="submit">Aceptar</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
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
