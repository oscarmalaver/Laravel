<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        Producto::create($request->all());
        return redirect()->route('productos.index');
    }

    public function edit($codigo)
    {
        $producto = Producto::findOrFail($codigo);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $codigo)
    {
        $producto = Producto::findOrFail($codigo);
        $producto->update($request->all());
        return redirect()->route('productos.index');
    }
}
