<?php

namespace App\Http\Controllers;
use App\Models\producto;

//use App\Http\Controllers\gestionarProductoController;

use Illuminate\Http\Request;
 use DB;
class gestionarProductoController extends Controller
{
     public function mostrarProductos() {
    //     $productos = DB::table('producto')->select('nombproducto', 'idproducto', 'precio')->get();
          $productos = producto::all();
         return view('dashboard.gestionarProducto', compact('productos'));
        
     }

     public function update(Request $request, $id)
{
    $producto = Producto::findOrFail($id);
    $producto->nombre = $request->nombre;
    $producto->precio = $request->precio;
    $producto->descripcion = $request->descripcion;
    $producto->save();

    return redirect()->back()->with('message', 'Los cambios se han guardado correctamente.');
}
public function edit($id)
{
    $producto = producto::findOrFail($id);
    // return view('dashboard', compact('producto'));
    return view('livewire.create-producto',compact('producto'));
}

    // public function mostrarProductos(){

    //     $productos = DB::table('producto')
    //         ->orderBy('idproducto', 'asc')
    //         ->paginate(7);

    //     return view("dashboard.gestionarProducto")->with("productos", $productos);

    // }
}
