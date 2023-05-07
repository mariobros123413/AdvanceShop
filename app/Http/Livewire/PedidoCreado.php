<?php

namespace App\Http\Livewire;

use App\Models\pedido;
use Illuminate\Http\Request;
use Livewire\Component;
use DB;

class PedidoCreado extends Component
{
    public function render()
    {
        $pedidos = DB::table('users')
            ->join('direccionenvio', 'direccionenvio.iddireccionenvio', '=', 'users.id')
            ->join('pedido', 'users.id', '=', 'pedido.idusers')
            ->select('pedido.idpedido', 'direccionenvio.nombre', 'pedido.estadoenvio', 'pedido.fecha')
            ->get();
        $productos = DB::table('pedidoproducto')
            ->join('producto', 'pedidoproducto.idproducto', '=', 'producto.idproducto')
            ->join('pedido', 'pedidoproducto.idpedido', '=', 'pedido.idpedido')
            ->select('pedido.idpedido', 'producto.nombproducto', 'producto.precio', 'pedidoproducto.cantidad')
            ->orderBy('pedido.idpedido')
            ->get()
            ->groupBy('idpedido');



        return view('livewire.pedido-creado', compact('pedidos', 'productos'));
    }

    public function cambiarEstado(Request $request)
    {
        pedido::where('idpedido', $request->idpedido)
          ->update(['estadoenvio' => $request->estado]);

        return redirect('pedidos');
    }

}