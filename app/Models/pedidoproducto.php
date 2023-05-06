<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidoproducto extends Model
{
    protected $table = 'pedidoproducto';
    protected $primaryKey = ['idpedido','idproducto'];

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [

        'idpedido',
        'idproducto',
        'cantidad'

    ];

    public function producto()
    {
        return $this->belongsTo(producto::class) and $this->hasMany(producto::class);
    }
    
    protected $guarded = [];
}
