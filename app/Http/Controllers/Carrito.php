<?php

namespace App\Http\Controllers;
// use Gloudemans\Shoppingcart\Facades\Cart;
use App\models\carrito;
use App\models\producto;
use App\models\User;
use Illuminate\Http\Request;
use DB;
class carritoController extends Controller
{
    public function index(){
        $productos = carrito::where('idusers', auth()->user()->id)
                      ->join('producto', 'carrito.idproducto', '=', 'producto.idproducto')
                      ->get(['producto.nombproducto', 'producto.precio']);
    return view('carrito', compact('productos'));
    }
     public function agregarProducto($idproducto){
        // obtener el producto a partir del ID
        $producto = producto::find($idproducto);

        // verificar si el producto existe
        if (!$producto) {
            return redirect()->back()->with('error', 'El producto no existe.');
        }

        // agregar el producto al carrito de compras
        carrito::add([
            'idusers' => $producto->idproducto,
            'idproducto' => $producto->nombproducto,
            // 'price' => $producto->precio,
            // 'quantity' => 1,
            // 'attributes' => [
            //     'descripcion' => $producto->descripcion,
            //     'marca' => $producto->marca,
            //     'idCategoria' => $producto->idCategoria,
            //     'stock' => $producto->stock,
            // ],
        ]);
       
        // redirigir al carrito de compras con un mensaje de éxito
        // return redirect()->route('carrito')->with('success', 'El producto se ha agregado al carrito.');
         return view('welcome');
     }
}
