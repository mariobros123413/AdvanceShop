<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\carritoController;
use App\Http\Livewire\ShopComponent;
use Livewire\Livewire;
use App\Http\Livewire\MostrarProductos;
use App\Http\Livewire\GestionarProductos;
use App\Http\Controllers\productoController;
use App\Http\Controllers\PaymentController;
use App\Http\Livewire\CrearCategoria;
use App\Http\Livewire\GestionarCategoria;
use App\Http\Controllers\PerfilController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', 'productoController@index')->name('welcome');


//->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// RUTAS DESDE EL CLIENTE
    ////////VER MI PERFIL
    Route::get('/perfil', [PerfilController::class,'index'])->name('perfil');
    ///////CAMBIAR USERNAME
    Route::post('/perfil/cambiarcambiarusername', 'App\Http\Controllers\PerfilController@cambiarUsername')->name('perfil.cambiarusername');
    //////CAMBIAR EMAIL
    Route::post('/perfil/cambiaremail', 'App\Http\Controllers\PerfilController@cambiarEmail')->name('perfil.cambiaremail');
    //////CAMBIAR TELEFONO
    Route::post('/perfil/cambiartelefono', 'App\Http\Controllers\PerfilController@cambiarTelefono')->name('perfil.cambiartelefono');
    //////CAMBIAR DIRECCION
    Route::post('/perfil/cambiardireccion', 'App\Http\Controllers\PerfilController@cambiarDireccion')->name('perfil.cambiardireccion');

    //////////MOSTRAR PRODUCTOS EN TIENDA
    Route::get('/producto', [MostrarProductos::class,'render'])->name('productos');
    Route::get('/', 'App\Http\Controllers\productoController@index')->name('productos.index'); //productos en welcome
    Route::view('pedidos', 'pedidos')->name('pedidos'); // view('ruta de la vista', )

    /////VER EL CARRITO
    Route::get('/carrito', [carritoController::class,'index'])->name('carrito');
    ///AÑADIR AL CARRITO UN PRODUCTO
    Route::post('/carrito/agregar/{idproducto}', [carritoController::class,'agregarProducto'])->name('carrito.agregar');
    //////ELIMINAR PRODUCTO DEL CARRITO
    Route::post('/carrito/eliminar/{idproducto}', [carritoController::class,'eliminarProducto'])->name('carrito.eliminar');
    //////ELIMINAR PRODUCTO DEL CARRITO
    Route::post('/carrito/incrementar/{idproducto}', [carritoController::class,'incrementar'])->name('carrito.incrementar');

    ///////ELIMINAR CARRITO AL PAGAR
    Route::get('/carrito/ecarrito/{status}', [carritoController::class,'eliminarCarrito'])->name('carrito.ecarrito');

    /////AGRADECIMIENTO EN CARRITO
    // Route::get('/carrito/{status}', 'carritoController@estado')->name('carrito.estado');
    //////PAGAR
    // Route::post('/checkout/{total}',  [PagoController::class,'pay'])->name('checkout');
    // Route::get('/checkout/{total}', 'App\Http\Controllers\PagoController@pay')->name('checkout');
    // Route::get('/paypal/{total}', 'App\Http\Controllers\PayPalService')->name('paypal');
    Route::post('/paypal', [PaymentController::class,'payWithPaypal'])->name('paypal');

     Route::get('/status', [PaymentController::class,'payPalStatus'])->name('status'); //procesar status del pago
    // Route::get('/status', 'PaymentController@payPalStatus')->name('status');

//RUTAS DESDE EL ADMINISTRADOR\\\
    //////MOSTRAR PRODUCTOS
    Route::get('/producto', [MostrarProductos::class,'render'])->name('productos');
    //CREAR PRODUCTOS
    Route::post('/dashboard', 'App\Http\Livewire\GestionarProductos@CrearProducto')->name('CrearProducto');

    //////MOSTRAR CATEGORIA
    Route::get('/categoria', [GestionarCategoria::class,'render'])->name('categorias');
    /////CREAR CATEGORIA
    Route::GET('/categorias', 'App\Http\Livewire\GestionarCategoria@CrearCategoria')->name('CrearCategoria');
// Route::view('dashboard.dashboard', 'dashboard.dashboard')->name('dashboard');
//  Route::get('/dashboard', function () {
//     return view('/dashboard/dashboard');
//   });

//RUTA LOGIN y REGISTRO
 Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth.admin')->name('dashboard');
 Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
 Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function(){
    return view('dashboard/dashboard');
 })->name('dashboard');

use Illuminate\Support\Facades\DB;

Route::get('/test', function () {
    $results = DB::connection('pgsql')->select('select * from producto');
    return response()->json($results);
});
require __DIR__.'/auth.php';
