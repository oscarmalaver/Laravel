<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // ================= API (JSON) =================
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    public function store(Request $request)
    {
        $producto = Producto::create($request->all());
        return response()->json($producto, 201);
    }

    public function show($codigo)
    {
        $producto = Producto::findOrFail($codigo);
        return response()->json($producto);
    }

    public function update(Request $request, $codigo)
    {
        $producto = Producto::findOrFail($codigo);
        $producto->update($request->all());
        return response()->json($producto);
    }

    public function destroy($codigo)
    {
        $producto = Producto::findOrFail($codigo);
        $producto->delete();
        return response()->json(null, 204);
    }


    // ================= VISTAS (Blade) =================
    public function vistaIndex()
    {
        $productos = Producto::all();
        return view('trabajo.productos.index', compact('productos'));
    }

    public function create()
    {
        return view('trabajo.productos.create');
    }

   public function storeWeb(Request $request)
{
    $request->validate([
        'codigo' => 'required|unique:productos,codigo',
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric|min:0',
        'cantidad' => 'required|integer|min:0',
    ], [
        'codigo.unique' => '❌ Error: El código ya existe. Por favor ingrese otro.',
        'codigo.required' => '❌ El código es obligatorio.',
        'nombre.required' => '❌ El nombre es obligatorio.',
        'precio.required' => '❌ El precio es obligatorio.',
        'cantidad.required' => '❌ La cantidad es obligatoria.',
    ]);

    // Crear producto
    Producto::create($request->all());

    return redirect()->route('productos.vistaIndex')
        ->with('success', '✅ Producto creado correctamente.');
}


    public function edit($codigo)
    {
        $producto = Producto::findOrFail($codigo);
        return view('trabajo.productos.edit', compact('producto'));
    }

    public function updateWeb(Request $request, $codigo)
    {
        $producto = Producto::findOrFail($codigo);
        $producto->update($request->all());
        return redirect()->route('productos.vistaIndex')
            ->with('success', 'Producto actualizado correctamente');
    }

   public function destroyWeb($codigo)
{
    $producto = Producto::findOrFail($codigo);

   if ($producto->ventas()->count() > 0) {
    return redirect()->route('productos.vistaIndex')
        ->with('error', '❌ No se puede eliminar este producto porque ya tiene ventas registradas.');
}

$producto->delete();

return redirect()->route('productos.vistaIndex')
    ->with('success', 'Producto eliminado correctamente');

}

}
