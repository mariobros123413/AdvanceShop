<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\carrito;
use App\Http\Livewire\ShopComponent;
use Livewire\Livewire;
use App\Http\Livewire\MostrarProductos;
use App\Http\Livewire\GestionarProductos;
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


// Route::get('/mostrarProductos', 'gestionarProducto@mostrarProductos'); //esto es para mostrar productos normalmente


Route::get('/producto', [MostrarProductos::class,'render'])->name('productos');
// Route::get('/mostrarProductos', 'gestionarProducto@mostrarProductos');
// RUTAS DESDE EL CLIENTE
// Route::get('/producto', 'App\Http\Controllers\productoController@index')->name('productos');

// Route::view('carrito', 'carrito')->name('carrito'); //importante para visualizar el html php
Route::view('pedidos', 'pedidos')->name('pedidos'); // view('ruta de la vista', )

    //carrito
    
    // Route::get('/carrito', [carrito::class, 'index'])->name('carrito');

    Route::POST('/carrito/agregarProducto/{idProducto}',[carrito::class, 'agregarProducto'] )->name('carrito.agregarProducto');
    // Route::GET('/carrito', 'carrito@index')->name('/carrito');
//   Route::GET('/carrito/{idProducto}','carrito@agregarProducto' )->name('carrito.agregarProducto');
// Route::group(['middleware' => ['web']], function () {
//     // ... otras rutas de tu aplicación ...

//     Route::get('/carrito', \App\Http\Livewire\ShopComponent::class, 'add')->name('ShopComponent.add');
// });

// Route::get('/carrito/{idProducto}', ShopComponent::class)->name('carrito');



//RUTAS DESDE EL ADMINISTRADOR
// Route::get('dashboard/gestionarProducto', 'App\Http\Controllers\gestionarProductoController@mostrarProductos');

// Route::get('/dashboard/gestionarProducto', 'dashboard.gestionarProductoController@mostrarProductos')->name('dashboard.gestionarProducto');
// Route::view('dashboard/gestionarProducto', 'dashboard/gestionarProducto')->name('dashboard/gestionarProducto');

// Route::get('/gestionarProductoController', [app\Http\Controllers\GestionarProductoController::class, 'mostrarProductos'])->name('gestionarProductoController');

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
