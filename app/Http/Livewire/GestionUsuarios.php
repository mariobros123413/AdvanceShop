<?php

namespace App\Http\Livewire;

use App\Models\direccionenvio;
use App\Models\User;
use Livewire\Component;

use Illuminate\Http\Request;
use DB;

class GestionUsuarios extends Component
{
    public function render()
    {
        $users = User::select('users.id', 'users.name', 'users.email', 'users.telefono', 'direccionenvio.nombre', 'direccionenvio.calle', 'direccionenvio.ciudad', 'direccionenvio.numcasa')
            ->join('direccionenvio', 'users.id', '=', 'direccionenvio.iddireccionenvio')
            ->get();
        return view('livewire.gestion-usuarios', compact('users'));
    }

    public function editardireccionenvio(Request $request, $iddireccionenvio)
    {
        $direccionenvio = direccionenvio::findOrFail($iddireccionenvio);
        $request->validate([
            'calle' => 'required',
            'numcasa' => 'required',
            'ciudad' => 'required',
            'nombre' => 'required',
        ]);

        $direccionenvio->nombre = $request->nombre;
        $direccionenvio->calle = $request->calle;
        $direccionenvio->numcasa = $request->numcasa;
        $direccionenvio->ciudad = $request->ciudad;

        $users= User::findOrFail($iddireccionenvio);
        $users->telefono= $request->telefono;
        $direccionenvio->save();
        
        return redirect('usuarios')->with('success', 'Usuario actualizada correctamente.');
    }
    
}