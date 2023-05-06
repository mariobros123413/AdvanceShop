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
    public $direction = 'desc';

    public function mount()
    {
        //
    }
    public function render()
    {
        // $productos = producto::all();
        $productos = producto::where('nombproducto', 'like', '%' . $this->search . '%')
            ->orwhere('descripcion', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)->get();
        return view('livewire.gestionar-productos', compact('productos'));
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

    public function crearProducto(Request $request)
    {


        $producto = [
            'idproducto' => $request->get('idproducto'),
            'nombproducto' => $request->get('nombproducto'),
            'descripcion' => $request->get('descripcion'),
            'precio' => $request->get('precio'),
            'marca' => $request->get('marca'),
            'idcategoria' => $request->get('idcategoria'),
            'stock' => $request->get('stock')
        ];

        producto::create($producto);



        $total = producto::all()->count();



        //Session::flash('message', 'Felicitaciones .! Niño Registrado Correctamente ...');
        return redirect('/dashboard');
    }
    public function editarProducto(Request $request, $id)
    {
        // Encontrar el producto por su ID
        $producto = producto::findOrFail($id);

        // Validar los datos del formulario
        $request->validate([
            'nombproducto' => 'required|max:30|string',
            'descripcion' => 'required|max:255|string',
            'precio' => 'required|numeric|min:0',
            'marca' => 'required|max:255|string',
            'idcategoria' => 'required|max:255|numeric',
            'stock' => 'required|max:255|numeric',
            // Agrega aquí las validaciones para los demás campos del formulario
        ]);

        // Actualizar los datos del producto con los valores del formulario
        $producto->nombproducto = $request->nombproducto;
        $producto->descripcion = $request->descripcion;
        $producto->marca = $request->marca;
        $producto->idcategoria = $request->idcategoria;
        $producto->stock = $request->stock;
        $producto->precio = $request->precio;
        // Agrega aquí los demás campos del formulario que quieras actualizar

        // Guardar los cambios en la base de datos
        $producto->save();

        // Redirigir al usuario a la página de productos con un mensaje de éxito
        return redirect('/dashboard')->with('success', 'Producto actualizado correctamente.');
    }

    public function eliminarProducto(Request $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->back()->with('error', 'El producto no existe');
        }

        $producto->delete();

        return redirect()->back()->with('success', 'Producto eliminado correctamente');
    }

}