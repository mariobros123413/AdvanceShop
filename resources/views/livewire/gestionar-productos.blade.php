<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    </div>
    <style>
        .flexasd{
            display: flex;
            background: #830510;
            color:#ddd;
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
        
    </style>
    <?php
    $producto=$productos;
    ?>
    <div class="px-6 py-y4 flexasd">
        <input type="text" wire:model="search" class="w-full" placeholder="Búsqueda por Nombre y Descripción">
        @include('livewire.create-producto')
    </div>

    <table class="table">
        <thead>
            <tr>
                <th class= "cursor-pointer" wire:click="order('marca')">Marca</th>
                <th class="cursor-pointer" wire:click="order('nombproducto')">Nombre</th>
                <th class="cursor-pointer" wire:click="order('precio')">Precio ($)</th>
                <th class="cursor-pointer" wire:click="order('descripcion')">Descripcion</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        @foreach($productos as $producto)
            <tr>
                <td>{{$producto->marca}}</td>
                <td>{{$producto->nombproducto}}</td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->idcategoria}}</td>
                <td>{{$producto->stock}}</td>
                <td>
                    <button>Editar</button>
                    
                    <button>Visualizar</button>
                </td>
            </tr>
        @endforeach
            
            
        </tbody>
    </table>
    
    

</div>
