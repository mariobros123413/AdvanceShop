<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table = 'categoria';

    protected $primaryKey = 'idcategoria';

    public $timestamps = false;

    protected $fillable = [

        'idcategoria',
        'nombcategoria',
        'descripcion'

    ];

    public function productos()
    {
        return $this->hasMany(producto::class);
    }

    protected $guarded = [];
}
