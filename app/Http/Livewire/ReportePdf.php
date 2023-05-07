<?php

namespace App\Http\Livewire;

use App\Models\categoria;
use App\Models\pedido;
use App\Models\producto;
use Barryvdh\DomPDF\Facade\Pdf;

use DB;
use Illuminate\Foundation\Auth\User;
use Livewire\Component;

class ReportePdf extends Component
{
    public function render()
    {

        return view('livewire.reporte-pdf');
    }

    public function pdfproducto()
    {
        $productos = DB::table('producto')
            ->select('producto.*')
            ->orderBy('idproducto', 'ASC')
            ->get();
        $pdf = Pdf::loadView('productopdf', compact('productos'));

        return $pdf->stream();
    }

    public function pdfusuario()
    {
        $users = DB::table('users')
            ->select('users.*')
            ->orderBy('id', 'ASC')
            ->get();
        $pdf = Pdf::loadView('userspdf', compact('users'));
        return $pdf->stream();
    }

    public function pdfcategoria()
    {

        $categorias = DB::table('categoria')
            ->select('categoria.*')
            ->orderBy('idcategoria', 'ASC')
            ->get();
        $pdf = Pdf::loadView('categoriapdf', compact('categorias'));

        return $pdf->stream();
    }

    public function pdfpedidos()
    {
        $pedidos = DB::table('users')
            ->join('direccionenvio', 'direccionenvio.iddireccionenvio', '=', 'users.id')
            ->join('pedido', 'users.id', '=', 'pedido.idusers')
            ->select('pedido.idpedido', 'direccionenvio.nombre', 'pedido.estadoenvio', 'pedido.fecha')
            ->orderBy('idpedido', 'ASC')
            ->get();
        $pdf = Pdf::loadView('pedidospdf', compact('pedidos'));

        return $pdf->stream();
    }
}