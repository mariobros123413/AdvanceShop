<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $table = 'cliente';

    protected $primaryKey = 'idCliente';

    public $timestamps = false;

    protected $fillable = [

        'idCliente',
        'nombre',
        'celular'

    ];
    public function cuenta()
    {
        return $this->belongsTo(cuenta::class);
    }

    public function direccionEnvio(){
        return $this->hasMany(direccionEnvio::class);
    }

    public function metodoPago(){
        return $this->hasMany(metodoPago::class);
    }

    public function carrito(){
        return $this->hasMany(carrito::class) and $this->belongsToy(carrito::class) ;
    }
    protected $guarded = [];
}
