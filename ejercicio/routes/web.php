<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/usuarios', [CrudController::class, 'vistaIndex'])->name('usuarios.index');
Route::get('/usuarios/create', [CrudController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [CrudController::class, 'storeWeb'])->name('usuarios.store');
Route::get('/usuarios/{codigo}/edit', [CrudController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{codigo}', [CrudController::class, 'updateWeb'])->name('usuarios.update');
Route::delete('/usuarios/{codigo}', [CrudController::class, 'destroyWeb'])->name('usuarios.destroy');

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;

Route::get('/menu', function () {
    return view('trabajo.menu');
})->name('menu');



Route::get('/ventas/', [VentaController::class, 'vistaIndex'])->name('ventas.vistaIndex');
Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas.create');
Route::get('/productos/', [ProductoController::class, 'vistaIndex'])->name('productos.vistaIndex');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::get('/productos/{codigo}/edit', [ProductoController::class, 'edit'])->name('productos.edit');

Route::put('/productos/{codigo}', [ProductoController::class, 'updateWeb'])->name('productos.update');
Route::delete('/productos/{codigo}', [ProductoController::class, 'destroyWeb'])->name('productos.destroy');

Route::post('/ventas', [VentaController::class, 'storeWeb'])->name('ventas.storeWeb');
Route::post('/productos', [ProductoController::class, 'storeWeb'])->name('productos.storeWeb');


