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
            .col{
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
                            <button>Editar</button>

                            <button class="col">Eliminar</button>
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
