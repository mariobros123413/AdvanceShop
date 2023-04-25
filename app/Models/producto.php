<?php

namespace App\Models;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory; //, HasCartAttributes

    protected $table = 'producto';

    protected $primaryKey = 'idProducto';

    public $timestamps = false;

    protected $fillable = [

        'idProducto',
        'nombProducto',
        'descripcion',
        'precio',
        'idCategoria',
        'stock'

    ];
    public function categoria()
    {
        return $this->belongsTo(categoria::class);
    }

    public function carrito(){
        return $this->hasMany(carrito::class) and $this->belongsTo(carrito::class);
    }
    protected $cartAttributes = [
        'nombProducto',
        'precio',
    ];
    protected $guarded = [];
}
