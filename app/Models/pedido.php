<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = ['idpedido'];

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [

        'idpedido',
        'idusers',
        'estadoenvio',
        'fecha'

    ];

    public function cliente()
    {
        return $this->belongsTo(user::class) and $this->hasMany(user::class);
    }


    
    protected $guarded = [];
}