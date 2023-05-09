<style>
    .flexasd {
        display: flex;
        background: #830510;
        color: #ddd;
        padding: 5px;
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
</style>
<div>LISTADO DE PEDIDOS - {{ now()->format('Y/m/d H:i:s') }}</div>
<table class="table">
    <thead>
        <tr>
            <th class="cursor-pointer" wire:click="order('idpedido')">ID Pedido</th>
            <th class="cursor-pointer" wire:click="order('nombre')">Propietario del Pedido</th>
            <th class="cursor-pointer" wire:click="order('estadoenvio')">Estado del Envío</th>
            <th class="cursor-pointer" wire:click="order('fecha')">Fecha del pedido</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->idpedido }}</td>
                <td>{{ $pedido->nombre }}</td>
                <td>{{ $pedido->estadoenvio }}</td>
                <td>{{ $pedido->fecha }}</td>


            </tr>
        @endforeach
    </tbody>
</table>

