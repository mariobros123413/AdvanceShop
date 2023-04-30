<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    protected $table = 'carrito';
    protected $primaryKey = ['idusers', 'idproducto'];

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [

        'idusers',
        'idproducto',
        'cantidad'

    ];

    public function cliente(){
        return $this->belongsTo(user::class) and $this->hasMany(user::class);
    }

    public function producto(){
        return $this->belongsTo(producto::class) and $this->hasMany(producto::class);
    }
    protected $guarded = [];
}
