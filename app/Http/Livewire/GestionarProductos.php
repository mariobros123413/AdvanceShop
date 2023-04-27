<?php

namespace App\Http\Livewire;
use App\Models\producto;
use Livewire\Component;
use Illuminate\Http\Request;

class GestionarProductos extends Component
{
    public $search;
    public $idP;
    public $sort = 'idproducto';
    public $direction ='desc';

    public function mount(){
        //
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

    public function CrearProducto(Request $request){

        
        $producto = [
            'idproducto' => $request->get('id'),
            'nombproducto' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion'),
            'precio' => $request->get('precio'),
            'marca' =>  $request->get('marca'),
            'idcategoria' =>  $request->get('idCategoria'),
            'stock' => $request->get('stock')
        ];
        
        producto::create($producto);



        $total = producto:: all()->count();
        
        
        
        //Session::flash('message', 'Felicitaciones .! Niño Registrado Correctamente ...');
        return redirect('/dashboard');
}
    
}
