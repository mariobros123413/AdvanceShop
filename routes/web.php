<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\carrito;
use App\Http\Livewire\ShopComponent;
use Livewire\Livewire;
use App\Http\Livewire\MostrarProductos;
use App\Http\Livewire\GestionarProductos;
use App\Http\Controllers\productoController;
use App\Http\Livewire\CrearCategoria;
use App\Http\Livewire\GestionarCategoria;
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
//////////MOSTRAR PRODUCTOS EN TIENDA
Route::get('/producto', [MostrarProductos::class,'render'])->name('productos');
Route::get('/', 'App\Http\Controllers\productoController@index')->name('productos.index'); //productos en welcome
Route::view('pedidos', 'pedidos')->name('pedidos'); // view('ruta de la vista', )


// Route::view('pedidos', 'pedidos')->name('pedidos'); // view('ruta de la vista', )

    //carrito
    
    // Route::get('/carrito', [carrito::class, 'index'])->name('carrito');

    Route::POST('/carrito/agregarProducto/{idproducto}',[carrito::class, 'agregarProducto'] )->name('carrito.agregarProducto');



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
