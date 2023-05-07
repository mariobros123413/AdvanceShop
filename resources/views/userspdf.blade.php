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
            <th class="cursor-pointer" wire:click="order('idpedido')">ID Usuario</th>
            <th class="cursor-pointer" wire:click="order('nombre')">Nombre</th>
            <th class="cursor-pointer" wire:click="order('estadoenvio')">Email</th>
            <th class="cursor-pointer" wire:click="order('fecha')">Teléfono</th>
            <th class="cursor-pointer" wire:click="order('fecha')">Fecha de Creación</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->telefono }}</td>
                <td>{{ $user->created_at }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
