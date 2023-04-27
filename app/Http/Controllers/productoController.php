<?php

namespace App\Http\Controllers;
use App\models\producto;
use Illuminate\Http\Request;
use DB;
class productoController extends Controller
{
    public function index(){
<<<<<<< HEAD
        
    $productos = producto::all();
    return view('welcome', compact('productos'));
=======
    // $productos = producto::all();
    // return view('/welcome', compact('productos'));
>>>>>>> cdb88c684fa5ac261cb0d2a289012d5e5299a91d
    }
}
