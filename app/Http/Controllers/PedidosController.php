<?php

namespace App\Http\Controllers;

use App\models\pedido;
use App\models\producto;
use App\models\User;
use Illuminate\Http\Request;
use DB;

class PedidosController extends Controller
{
    public function index()
    {
        $productos = DB::table('pedido')
            ->join('pedidoproducto', 'pedido.idpedido', '=', 'pedidoproducto.idpedido')
            ->join('producto', 'pedidoproducto.idproducto', '=', 'producto.idproducto')
            ->select('pedido.idpedido', 'producto.nombproducto', 'producto.precio', 'pedidoproducto.cantidad', 'pedido.estadoenvio')
            ->where('pedido.idusers', auth()->user()->id)
            ->groupBy('pedido.idpedido', 'producto.nombproducto', 'producto.precio', 'pedidoproducto.cantidad', 'pedido.estadoenvio')
            ->get();



        return view('pedido', compact('productos'));
    }

}