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
    public $direction = 'asc';

    public function mount()
    {
        //
    }
    public function render()
    {
        // $productos = producto::all();
        $categorias = categoria::where('nombcategoria', 'like', '%' . $this->search . '%')
            ->orwhere('descripcion', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)->get();
        return view('livewire.gestionar-categoria', compact('categorias'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {

            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }

        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function crearCategoria(Request $request)
    {


        $categoria = [
            'idcategoria' => $request->get('idcategoria'),
            'nombcategoria' => $request->get('nombcategoria'),
            'descripcion' => $request->get('descripcion')
        ];

        categoria::create($categoria);



        $total = categoria::all()->count();



        //Session::flash('message', 'Felicitaciones .! Niño Registrado Correctamente ...');
        return redirect('categoria');
    }
    public function editarCategoria(Request $request, $idcategoria)
    {
        $categoria = categoria::findOrFail($idcategoria);
        $request->validate([
            'nombcategoria' => 'required|max:30|string',
             'descripcion' => 'required|max:255|string',
         ]);

        $categoria->nombcategoria = $request->nombcategoria;
        $categoria->descripcion = $request->descripcion;

        $categoria->save();
        
        return redirect('categoria')->with('success', 'Categoria actualizada correctamente.');
    }

    public function eliminarCategoria(Request $request, $id)
    {
        dd($id);
        $categoria = Categoria::find($id);
        

        if (!$categoria) {
            return redirect()->back()->with('error', 'La categoria no existe');
        }
        $categoria->delete();

        return redirect()->back()->with('success', 'Categoria eliminada correctamente');
    }
}