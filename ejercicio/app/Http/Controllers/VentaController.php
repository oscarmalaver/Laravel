<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    // ================= API (JSON) =================

    // Mostrar todas las ventas (con producto asociado)
    public function index()
    {
        $ventas = Venta::with('producto')->get();
        return response()->json($ventas);
    }

    // Crear una venta (API)
    public function store(Request $request)
    {
        $producto = Producto::findOrFail($request->producto_id);

        $total = $producto->precio * $request->cantidad_vendida;

        $venta = Venta::create([
            'producto_id'      => $producto->codigo,
            'cantidad_vendida' => $request->cantidad_vendida,
            'precio_unitario'  => $producto->precio,
            'total'            => $total,
            'fecha'            => now(),
        ]);

        // Actualizar stock
        $producto->cantidad -= $request->cantidad_vendida;
        $producto->save();

        return response()->json($venta, 201);
    }

    // Mostrar una venta por ID
    public function show($id)
    {
        $venta = Venta::with('producto')->findOrFail($id);
        return response()->json($venta);
    }

    // Eliminar una venta
    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return response()->json(null, 204);
    }


    // ================= VISTAS (Blade) =================

    // Vista: listar ventas
    public function vistaIndex()
    {
        $ventas = Venta::with('producto')->get();
        return view('trabajo.ventas.index', compact('ventas'));
    }

    // Vista: formulario de crear venta
    public function create()
    {
        $productos = Producto::all();
        return view('trabajo.ventas.create', compact('productos'));
    }

    // Guardar venta desde la vista
    public function storeWeb(Request $request)
{
    $producto = Producto::findOrFail($request->producto_id);

    // Verificar disponibilidad
    if ($request->cantidad_vendida > $producto->cantidad) {
        return redirect()->back()
            ->with('error', '❌ No hay suficiente stock disponible para este producto.');
    }

    // Calcular total
    $total = $producto->precio * $request->cantidad_vendida;

    // Crear venta
    Venta::create([
        'producto_id'      => $producto->codigo,
        'cantidad_vendida' => $request->cantidad_vendida,
        'precio_unitario'  => $producto->precio,
        'total'            => $total,
        'fecha'            => Carbon::now(),
    ]);

    // Actualizar stock
    $producto->cantidad -= $request->cantidad_vendida;
    $producto->save();

    return redirect()->route('ventas.vistaIndex')
        ->with('success', '✅ Venta registrada correctamente.');
}


    // Eliminar venta desde la vista
    public function destroyWeb($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return redirect()->route('trabajo.ventas.vistaIndex')
            ->with('success', 'Venta eliminada correctamente');
    }
}
