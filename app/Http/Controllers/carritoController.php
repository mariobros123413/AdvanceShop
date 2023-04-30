<?php

namespace App\Http\Controllers;

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
                      ->get(['producto.nombproducto', 'producto.precio', 'carrito.cantidad']);
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
        // carrito::create([
        //     'idusers' => auth()->user()->id,
        //     'idproducto' => $producto->idproducto
        // ]);
        $carrito = carrito::where('idusers', auth()->user()->id)
                      ->where('idproducto', $producto->idproducto)
                      ->first();

        if ($carrito) { 
    
            // Aumentar la cantidad en 1
            $carrito->cantidad = $carrito->cantidad + 1;
        
            // Guardar los cambios en la base de datos
            
        } else {
            // Si el producto no existe en el carrito, agregarlo con cantidad 1
            carrito::create([
                'idusers' => auth()->user()->id,
                'idproducto' => $producto->idproducto,
                'cantidad'=> 1
            ]);
        }
         //$carrito->save();

        // redirigir al carrito de compras con un mensaje de éxito
        return redirect()->route('carrito')->with('success', 'El producto se ha agregado al carrito.');
        //  return view('carrito');
     }
}
