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
        <p>Bienvenido al panel de Gestión de Categorías</p>
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

            .col {
                background-color: #4CAF50;
            }
        </style>
        <?php
        $categoria = $categorias;
        ?>
        <div class="px-6 py-y4 flexasd">
            <input type="text" wire:model="search" class="w-full" placeholder="Búsqueda por Nombre y Descripción">
            @include('livewire.create-categoria')
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th class="cursor-pointer" wire:click="order('idcategoria')">ID</th>
                    <th class="cursor-pointer" wire:click="order('nombcategoria')">Nombre</th>
                    <th class="cursor-pointer" wire:click="order('descripcion')">Descripcion</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->idcategoria }}</td>
                        <td>{{ $categoria->nombcategoria }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-editar-{{ $categoria->idcategoria }}">
                                Editar
                            </button>
                            <!-- Modal para editar el categoria -->
                            <div class="modal fade" id="modal-editar-{{ $categoria->idcategoria }}" tabindex="-1"
                                role="dialog" aria-labelledby="modal-editar-{{ $categoria->idcategoria }}-titulo"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-editar-{{ $categoria->idcategoria }}-titulo">
                                                Editar categoria</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Formulario para editar el categoria -->
                                            <form method="POST" action="{{ route('editar.categoria', $categoria->idcategoria) }}">
                                                @csrf
                                                <div>
                                                    <label for="nombcategoria">Nombre de la categoria: </label>
                                                    <input type="text" name="nombcategoria"
                                                        value="{{ $categoria->nombcategoria }}">
                                                </div>
                                                <div>
                                                    <label for="nombcategoria">Descripción: </label>
                                                    <input type="text" name="descripcion"
                                                        value="{{ $categoria->descripcion }}">
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
                                data-target="#modal-eliminar-{{ $categoria->idcategoria }}">
                                Eliminar
                            </button>
                            <!-- Modal para editar el categoria -->
                            <div class="modal fade" id="modal-eliminar-{{ $categoria->idcategoria }}" tabindex="-1"
                                role="dialog" aria-labelledby="modal-editar-{{ $categoria->idcategoria }}-titulo"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-eliminar-{{ $categoria->idcategoria }}-titulo">
                                                Eliminar categoria</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Formulario para editar el categoria -->
                                            <form method="POST"
                                                action="{{ route('eliminar.categoria', $categoria->idcategoria) }}">
                                                
                                                @csrf
                                                <div>
                                                    <label for="nombcategoria">Estás seguro de Eliminar este categoria?
                                                    </label>
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
    @stop




    @section('js')
        <script>
            console.log('Hi!');
        </script>
    @stop
</div>
