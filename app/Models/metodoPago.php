<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metodoPago extends Model
{
    protected $table = 'metodoPago';

    protected $primaryKey = 'idMetodoPago';

    public $timestamps = false;

    protected $fillable = [

        'idMetodoPago',
        'nombre',
        'numeroTarjeta',
        'fechaVenc'
    ];

    public function cliente(){
        return $this->belongsTo(cliente::class);
    }
    protected $guarded = [];
}
