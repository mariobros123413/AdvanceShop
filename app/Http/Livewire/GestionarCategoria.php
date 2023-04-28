<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categoria;
use Illuminate\Http\Request;
class GestionarCategoria extends Component
{
    public $search;
    public $idP;
    public $sort = 'idcategoria';
    public $direction ='desc';

    public function mount(){
        //
    }
    public function render()
    {
        // $productos = producto::all();
        $categorias = categoria::where('nombcategoria','like','%' . $this->search . '%')
                               ->orwhere('descripcion','like','%' . $this->search . '%')
                               ->orderBy($this->sort,$this->direction)->get();
        return view('livewire.gestionar-categoria', compact('categorias'));
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

    public function CrearCategoria(Request $request){

        
        $categoria = [
            'idcategoria' => $request->get('id'),
            'nombcategoria' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion')
        ];
        
        categoria::create($categoria);



        $total = categoria:: all()->count();
        
        
        
        //Session::flash('message', 'Felicitaciones .! Niño Registrado Correctamente ...');
        return redirect('/dashboard');
}
    
}
