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
    // public function mostrarProductos(){

    //     $productos = DB::table('producto')
    //         ->orderBy('idproducto', 'asc')
    //         ->paginate(7);

    //     return view("dashboard.gestionarProducto")->with("productos", $productos);

    // }
}
