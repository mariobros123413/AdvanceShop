<?php

namespace App\Http\Controllers;

use App\models\direccionenvio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function index()
    {
        $direccionEnvio = direccionenvio::where('iddireccionenvio', auth()->user()->id)->first();

        return view('perfil', compact('direccionEnvio'));
    }

    public function cambiarUsername(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->username;
        $user->save();

        return redirect('/perfil');
    }

    public function cambiarEmail(Request $request)
    {
        $user = Auth::user();
        $user->email = $request->email;
        $user->save();

        return redirect('/perfil');
    }

    public function cambiarTelefono(Request $request)
    {
        $user = Auth::user();
        $user->telefono = $request->telefono;
        $user->save();

        return redirect('/perfil');
    }

    public function cambiarDireccion(Request $request)
    {
        $direccionEnvio = direccionenvio::where('iddireccionenvio', auth()->user()->id)->first();
        $direccionEnvio->nombre = $request->nombre;
        $direccionEnvio->calle = $request->calle;
        $direccionEnvio->numcasa = $request->numcasa;
        $direccionEnvio->ciudad = $request->ciudad;
        $direccionEnvio->save();

        return redirect('/perfil');
    }

}