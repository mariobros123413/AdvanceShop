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
<<<<<<< HEAD
        'nombproducto',
=======
        'nombproducto',
>>>>>>> cdb88c684fa5ac261cb0d2a289012d5e5299a91d
        'precio',
    ];
    protected $guarded = [];
}
