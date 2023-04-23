<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
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
Route::get('/mostrar-vista', 'carrito@mostrarVista');

Route::get('/mostrarProductos', 'gestionarProducto@mostrarProductos');

// RUTAS DESDE EL CLIENTE
Route::get('/', 'App\Http\Controllers\productoController@index')->name('productos.index');

Route::view('carrito', 'carrito')->name('carrito'); //importante para visualizar el html php
Route::view('pedidos', 'pedidos')->name('pedidos'); // view('ruta de la vista', )

// Route::post('/cart/add/{id}', [CarritoController::class, 'addToCart'])->name('cart.add');



//RUTAS DESDE EL ADMINISTRADOR
Route::get('dashboard/gestionarProducto', 'App\Http\Controllers\gestionarProductoController@mostrarProductos');

// Route::get('/dashboard/gestionarProducto', 'dashboard.gestionarProductoController@mostrarProductos')->name('dashboard.gestionarProducto');
// Route::view('dashboard/gestionarProducto', 'dashboard/gestionarProducto')->name('dashboard/gestionarProducto');

Route::get('/gestionarProductoController', [app\Http\Controllers\GestionarProductoController::class, 'mostrarProductos'])->name('gestionarProductoController');

// Route::view('dashboard.dashboard', 'dashboard.dashboard')->name('dashboard');
//  Route::get('/dashboard', function () {
//     return view('/dashboard/dashboard');
//   });


//RUTA LOGIN y REGISTRO
// Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth.admin')->name('dashboard.index');
Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard.index');


use Illuminate\Support\Facades\DB;

Route::get('/test', function () {
    $results = DB::connection('pgsql')->select('select * from producto');
    return response()->json($results);
});
require __DIR__.'/auth.php';
