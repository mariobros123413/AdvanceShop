<?php

namespace App\Models;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory; //, HasCartAttributes

    protected $table = 'producto';

    protected $primaryKey = 'idproducto';

    public $timestamps = false;

    protected $fillable = [

        'idproducto',
        'nombproducto',
        'descripcion',
        'precio',
        'marca',
        'idcategoria',
        'stock',
        'imagen_url'
    ];

    public function categoria()
    {
        return $this->belongsTo(categoria::class);
    }

    public function carrito(){
        return $this->hasMany(carrito::class) and $this->belongsTo(carrito::class);
    }
    protected $cartAttributes = [
        'nombproducto',
        'precio',
    ];
    protected $guarded = [];
}
