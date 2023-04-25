<?php

namespace App\Http\Livewire;
use App\Models\producto;

// use Hardevine\LaravelShoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class ShopComponent extends Component{
    use WithPagination;
    public $totalProductos;
    public $totalCompra;
    public $idProducto;

    // public function store($product_id,$product_name, $product_price){
    //     Cart::add($product_id,$product_name, 1,$product_price)->associate('\App\Models\producto');
    //     session()->flash('success_message','El producto se agregó al carrito :)');
    //     return redirect()->route('dashboard');
    // }
    public function __construct($idProducto)
    {
        $this->idProducto = $idProducto;
    }
    public function add($idProducto)
    {

    //     $producto = Producto::find($idProducto);
    // Cart::add($producto->id, $producto->nombre, 1, $producto->precio);
    // $this->emit('carritoActualizado');
    // $this->actualizarTotales();
    $producto = producto::find($this->idProducto);

    Cart::add($producto->id, $producto->nombre, 1, $producto->precio);

    $this->emit('carritoActualizado');

    return redirect()->route('carrito');
    }
    public function mount($idProducto = null)
    {
        $this->idProducto = $idProducto;
        $this->actualizarTotales();
    }

    public function render()
    {
        return view('carrito');
    }

    public function agregarProducto($id)
    {
        $producto = Producto::find($id);

        Cart::add($producto->id, $producto->nombre, 1, $producto->precio);

        $this->actualizarTotales();
    }

    public function eliminarProducto($rowId)
    {
        Cart::remove($rowId);

        $this->actualizarTotales();
    }

    public function vaciarCarrito()
    {
        Cart::destroy();

        $this->actualizarTotales();
    }

    private function actualizarTotales()
    {
        $this->totalProductos = Cart::count();
        $this->totalCompra = Cart::total();
    }
}