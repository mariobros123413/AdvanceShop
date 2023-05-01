<?php

namespace App\Http\Controllers;

use App\models\carrito;
use App\models\producto;
use App\models\User;
use Illuminate\Http\Request;

use DB;

class carritoController extends Controller
{
    public function index()
    {
        $productos = carrito::where('idusers', auth()->user()->id)
            ->join('producto', 'carrito.idproducto', '=', 'producto.idproducto')
            ->get(['producto.nombproducto', 'producto.precio', 'carrito.cantidad']);
        return view('carrito', compact('productos'));
    }

    public function agregarProducto($idproducto)
    {
        $producto = producto::find($idproducto);

        // verificar si el producto existe
        if (!$producto) {
            return redirect()->back()->with('error', 'El producto no existe.');
        }

        $carrito = carrito::where('idusers', auth()->user()->id)
            ->where('idproducto', $producto->idproducto)
            ->first();

        if ($carrito) {

            // Aumentar la cantidad en 1
            DB::table('carrito')
                ->where('idproducto', $producto->idproducto)
                ->where('idusers', auth()->id())
                ->increment('cantidad');
            // Guardar los cambios en la base de datos

        } else {
            // Si el producto no existe en el carrito, agregarlo con cantidad 1
            carrito::create([
                'idusers' => auth()->user()->id,
                'idproducto' => $producto->idproducto,
                'cantidad' => 1
            ]);
        }
        //$carrito->save();

        // redirigir al carrito de compras con un mensaje de éxito
        return redirect()->route('carrito')->with('success', 'El producto se ha agregado al carrito.');
    }

    public function eliminarProducto($nombproducto)
    {

        // buscar el producto en el carrito por su idproducto
        $idproducto = producto::where('nombproducto', $nombproducto)->first()->idproducto;

        // si el producto no existe en el carrito, redirigir al carrito con un mensaje de error
        if (!$idproducto) {
            return redirect()->route('carrito')->with('error', 'El producto no se encontró en el carrito.');
        }

        // eliminar el producto del carrito

        $carritoProducto = carrito::where('idusers', auth()->user()->id)
            ->where('idproducto', $idproducto)
            ->delete();

        // $carritoProducto->delete();

        // redirigir al carrito con un mensaje de éxito
        return redirect()->route('carrito')->with('success', 'El producto se ha eliminado del carrito.');

    }

    public function eliminarCarrito($status)
    {
        if ($status == 'Gracias! El pago a través de PayPal se ha ralizado correctamente.') {

            // Obtener todos los productos en el carrito para el usuario actual
            $carritoProductos = carrito::where('idusers', auth()->user()->id)->get();

            // Recorrer todos los productos del carrito y disminuir el stock en la tabla `producto`
            foreach ($carritoProductos as $carritoProducto) {
                $producto = producto::find($carritoProducto->idproducto);
                $producto->stock -= $carritoProducto->cantidad;
                $producto->save();
            }
            carrito::where('idusers', auth()->user()->id)->delete();

        } else {
            //mensaje de error al cliente
        }
        return redirect()->route('carrito');
    }

    public function incrementar($nombproducto)
    {
        $producto = producto::where('nombproducto', $nombproducto)->first();
        $idproducto = $producto->idproducto;

        $carritoProducto = carrito::where('idusers', auth()->id())
            ->where('idproducto', $idproducto)
            ->first();

        if ($carritoProducto) {
            if ($carritoProducto->cantidad < $producto->stock) {
                DB::table('carrito')
                    ->where('idproducto', $idproducto)
                    ->where('idusers', auth()->id())
                    ->increment('cantidad');
            }
        }

        // DB::table('carrito')
        //     ->where('idproducto', $idproducto)
        //     ->where('idusers', auth()->id())
        //     ->increment('cantidad');
        return redirect()->route('carrito');
    }
}