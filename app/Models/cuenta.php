<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuenta extends Model
{
    protected $table = 'cuenta';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [

        'id',
        'usuario',
        'contrasena',
        'correo'

    ];
    public function cliente()
    {
        return $this->hasMany(cliente::class);
    }

    public function administrador()
    {
        return $this->hasMany(administrador::class);
    }
    protected $guarded = [];
}
