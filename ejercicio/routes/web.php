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
