<?php

namespace App\Http\Livewire;
use App\Models\producto;
use Livewire\Component;

class GestionarProductos extends Component
{
    public $search;
    public $idP;
    public $sort = 'idproducto';
    public $direction ='desc';

    // public $nombre;
    // public $descripcion;
    // public $precio;
    // public $marca;
    // public $idCategoria;
    // public $stock;
    // , $nombProducto, $descripcion, $precio, $marca, $idCategoria, $stock
    public function mount(){
        // $this->idP=$idProducto;
        // $this->nombre=$nombProducto;
        // $this->descripcion=$descripcion;
        // $this->precio=$precio;
        // $this->marca=$precio;
        // $this->idCategoria=$idCategoria;
        // $this->stock=$stock;
    }
    public function render()
    {
        // $productos = producto::all();
        $productos = producto::where('nombproducto','like','%' . $this->search . '%')
                               ->orwhere('descripcion','like','%' . $this->search . '%')
                               ->orderBy($this->sort,$this->direction)->get();
        return view('livewire.gestionar-productos', compact('productos'));
    }
    
    public function order($sort){
        if ($this->sort==$sort){

            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
            
        }else{
            $this->sort=$sort;
            $this->direction = 'asc';
        }
    }
}
