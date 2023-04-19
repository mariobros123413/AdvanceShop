<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrador extends Model
{
    protected $table = 'persona';

    protected $primaryKey = 'idAdmin';

    public $timestamps = false;

    protected $fillable = [

        'idAdmin',
        'usuario',
        'usuario',
        'contrasena',
        'correo',
        'nombre'

    ];
    
    public function cuenta(){
        return $this->belongsTo(cuenta::class);
    }
    protected $guarded = [];
}
