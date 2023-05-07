
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
<?php
$categoria = $categorias;
?>
<div> LISTADO DE CATEGORIAS - {{ now()->format('Y/m/d H:i:s') }}</div>
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
                
            </tr>
        @endforeach


    </tbody>
</table>
