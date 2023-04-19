<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
});
//->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/mostrar-vista', 'carrito@mostrarVista');
Route::get('dashboard/gestionarProducto', 'app\Http\Controllers\gestionarProducto@mostrarProductos')->name('gestionarProducto');
Route::get('/mostrarProductos', 'gestionarProducto@mostrarProductos');

// RUTAS DESDE EL CLIENTE
Route::view('carrito', 'carrito')->name('carrito'); //importante para visualizar el html php

//RUTAS DESDE EL ADMINISTRADOR
Route::view('gestionarProducto', 'gestionarProducto')->name('gestionarProducto');






use Illuminate\Support\Facades\DB;

Route::get('/test', function () {
    $results = DB::connection('pgsql')->select('select * from cuenta');
    return response()->json($results);
});
require __DIR__.'/auth.php';
