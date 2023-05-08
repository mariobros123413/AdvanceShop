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
        <style>
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
    @stop
    @section('content')
        <p>Bienvenido al panel de Gestión de Usuarios</p>
        <table class="table">
            <thead>
                <tr>
                    <th class="cursor-pointer" wire:click="order('marca')">ID</th>
                    <th class="cursor-pointer" wire:click="order('nombuser')">Nombre</th>
                    <th class="cursor-pointer" wire:click="order('precio')">Email</th>
                    <th class="cursor-pointer" wire:click="order('descripcion')">Teléfono</th>
                    <th class="cursor-pointer" wire:click="order('descripcion')">Ciudad</th>
                    <th class="cursor-pointer" wire:click="order('descripcion')">Calle</th>
                    <th class="cursor-pointer" wire:click="order('descripcion')">Nro Casa</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telefono }}</td>
                        <td>{{ $user->ciudad }}</td>
                        <td>{{ $user->calle }}</td>
                        <td>{{ $user->numcasa }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-editar-{{ $user->iduser }}">
                                Editar
                            </button>
                            <!-- Modal para editar el user -->
                            <div class="modal fade" id="modal-editar-{{ $user->iduser }}" tabindex="-1"
                                role="dialog" aria-labelledby="modal-editar-{{ $user->iduser }}-titulo"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-editar-{{ $user->iduser }}-titulo">
                                                Editar direccion de envío</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Formulario para editar el user -->
                                            <form method="POST"
                                                action="{{ route('editar.direccionenvio', $user->id) }}">
                                                @csrf
                                                <div>
                                                    <label for="nombre">Nuevo nombre de propietario: </label>
                                                    <input type="text" name="nombre"
                                                        value="{{ $user->nombre }}">
                                                </div>
                                                <div>
                                                    <label for="ciudad">Nuevo nombre de la ciudad: </label>
                                                    <input type="text" name="ciudad"
                                                        value="{{ $user->ciudad }}">
                                                </div>
                                                <div>
                                                    <label for="calle">Nuevo nombre de la calle: </label>
                                                    <input type="text" name="calle"
                                                        value="{{ $user->calle }}">
                                                </div>
                                                <div>
                                                    <label for="numcasa">Nuevo número de casa: </label>
                                                    <input type="text" name="numcasa" value="{{ $user->numcasa }}">
                                                </div>
                                                <div>
                                                    <label for="telefono">Nuevo teléfono: </label>
                                                    <input type="text" name="telefono" value="{{ $user->telefono }}">
                                                </div>
                                                <button type="submit">Guardar cambios</button>
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

</div>
