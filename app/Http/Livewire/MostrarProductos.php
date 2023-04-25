<?php

namespace App\Http\Livewire;

use App\models\producto;
use Livewire\Component;

class MostrarProductos extends Component
{public $mostrarProductos = false;
    public function render()
    {
        $productos = producto::all();
        return view('livewire.mostrar-productos', compact('productos'));
        // Cargar y mostrar la lista de productos
    }
        
    }

