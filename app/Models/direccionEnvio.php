<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class direccionEnvio extends Model
{
    protected $table = 'direccionEnvio';

    protected $primaryKey = 'idDireccionEnvio';

    public $timestamps = false;

    protected $fillable = [

        'idDireccionEnvio',
        'calle',
        'numCasa',
        'ciudad'

    ];
    public function cliente(){
        return $this->belongsTo(cliente::class);
    }
    protected $guarded = [];
}
