<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\carrito;
use Illuminate\Http\Request;

class carrito extends Controller
{
    public function index(){
        return view('carrito');
    }
     public function agregarProducto($idProducto){
        // obtener el producto a partir del ID
        $producto = producto::find($idProducto);

        // verificar si el producto existe
        if (!$producto) {
            return redirect()->back()->with('error', 'El producto no existe.');
        }

        // agregar el producto al carrito de compras
        Cart::add([
            'id' => $producto->idProducto,
            'name' => $producto->nombProducto,
            'price' => $producto->precio,
            'quantity' => 1,
            'attributes' => [
                'descripcion' => $producto->descripcion,
                'marca' => $producto->marca,
                'idCategoria' => $producto->idCategoria,
                'stock' => $producto->stock,
            ],
        ]);
       
        // redirigir al carrito de compras con un mensaje de éxito
        // return redirect()->route('carrito')->with('success', 'El producto se ha agregado al carrito.');
         return view('welcome');
     }
}
