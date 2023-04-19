<?php
use App\Models\producto;
// namespace App\Http\Controllers;
// use App\Http\Controllers\gestionarProductoController;

use Illuminate\Http\Request;
use DB;
class gestionarProducto extends Controller
{
    public function mostrarProductos() {
        $producto = DB::table('producto')->select('nombProducto', 'idProducto', 'precio')->get();
        return view('gestionarProducto.blade.php', compact('productos'));
    }
    
}
