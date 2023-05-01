<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class direccionenvio extends Model
{
    protected $table = 'direccionenvio';

    protected $primaryKey = 'iddireccionenvio';

    public $timestamps = false;

    protected $fillable = [

        'iddireccionenvio',
        'calle',
        'numCasa',
        'ciudad'

    ];
    public function users(){
        return $this->belongsTo(users::class);
    }
    protected $guarded = [];
}
