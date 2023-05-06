<?php

namespace App\Http\Controllers;

use App\models\producto;
use Illuminate\Http\Request;
use DB;

class productoController extends Controller
{
    public function index()
    {
        $productos = producto::where('stock', '>', 0)->get();
        return view('welcome', compact('productos'));
    }
}