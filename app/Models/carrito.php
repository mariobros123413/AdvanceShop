<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    protected $table = 'carrito';

    protected $primaryKey = 'idCliente, idProducto';

    public $timestamps = false;

    protected $fillable = [

        'idCliente',
        'idProducto'

    ];

    public function cliente(){
        return $this->belongsTo(cliente::class) and $this->hasMany(cliente::class);
    }

    public function producto(){
        return $this->belongsTo(producto::class) and $this->hasMany(producto::class);
    }
    protected $guarded = [];
}
