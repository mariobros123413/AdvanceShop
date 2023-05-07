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
            /* Estilos para ordenar la tabla */
            th {
                cursor: pointer;
            }

            th:hover {
                background-color: #f5f5f5;
            }

            th:after {
                content: '';
                display: inline-block;
                vertical-align: middle;
                margin-left: 5px;
                width: 0;
                height: 0;
                border-top: 5px solid transparent;
                border-bottom: 5px solid transparent;
            }

            th.asc:after {
                border-top: 5px solid black;
            }

            th.desc:after {
                border-bottom: 5px solid black;
            }
        </style>
    @stop
    @section('content')
        <p>Bienvenido al panel de Gestión de Pedidos</p>
        <table class="table">
            <thead>
                <tr>
                    <th class="cursor-pointer" wire:click="order('idpedido')">ID Pedido</th>
                    <th class="cursor-pointer" wire:click="order('nombre')">Propietario del Pedido</th>
                    <th class="cursor-pointer" wire:click="order('estadoenvio')">Estado del Envío</th>
                    <th class="cursor-pointer" wire:click="order('fecha')">Fecha del pedido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->idpedido }}</td>
                        <td>{{ $pedido->nombre }}</td>
                        <td>{{ $pedido->estadoenvio }}</td>
                        <td>{{ $pedido->fecha }}</td>

                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-ver-{{ $pedido->idpedido }}">
                                Ver Productos
                            </button>
                            <!-- Modal para editar el producto -->
                            <div class="modal fade" id="modal-ver-{{ $pedido->idpedido }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-ver-{{ $pedido->idpedido }}-titulo">Productos
                                                del Pedido</h5>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre del producto</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($productos[$pedido->idpedido] as $producto)
                                                        <tr>
                                                            <td>{{ $producto->nombproducto }}</td>
                                                            <td>{{ $producto->precio }}</td>
                                                            <td>{{ $producto->cantidad }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>


                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button id="{{ $pedido->idpedido }}-edit-button" type="button"
                                aria-label="Edit State Shipment" class="btn btn-primary"
                                data-track="{&quot;actionName&quot;:&quot;individual-phone-number-edit&quot;}"
                                onclick="document.getElementById('{{ $pedido->idpedido }}-edit-form').style.display = 'block';">Editar
                                Estado del envio
                            </button>
                            <div id="{{ $pedido->idpedido }}-edit-form" style="display:none;">
                                <form method="POST" action="{{ route('pedidos.cambiarestado') }}"
                                    onsubmit="return validarForm()">
                                    @csrf
                                    <input type="hidden" name="idpedido" value="{{ $pedido->idpedido }}">
                                    <label for="{{ $pedido->idpedido }}-estado">Nuevo estado:</label>
                                    <input type="text" name="estado" id="{{ $pedido->idpedido }}-estado">
                                    <button class="save" type="submit">Guardar cambios</button>
                                    <button class="cancel" type="button"
                                        onclick="cancelarEdicion('{{ $pedido->idpedido }}-edit-form')">Cancelar</button>
                                </form>
                            </div>
                            <script>
                                function validarForm() {
                                    var username = document.getElementById("estado").value.trim();
                                    if (username === "") {
                                        alert("El campo del nuevo estado es obligatorio");
                                        return false;
                                    }
                                    return true;
                                }
                            </script>
                            <script>
                                function cancelarEdicion(formId) {
                                    document.getElementById(formId).style.display = 'none';
                                }
                            </script>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>










    @stop
</div>
