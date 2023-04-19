<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table = 'categoria';

    protected $primaryKey = 'idCategoria';

    public $timestamps = false;

    protected $fillable = [

        'idCategoria',
        'nombCategoria',
        'descripcion'

    ];

    public function productos()
    {
        return $this->hasMany(producto::class);
    }

    protected $guarded = [];
}
