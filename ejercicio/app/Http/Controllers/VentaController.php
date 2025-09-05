<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function create()
    {
        $productos = Producto::all();
        return view('ventas.create', compact('productos'));
    }
    public function index()
{
    $ventas = Venta::with('producto')->get();
    return view('ventas.index', compact('ventas'));
}


    public function store(Request $request)
    {
        $producto = Producto::findOrFail($request->producto_id);

        // Calcular total
        $total = $producto->precio * $request->cantidad_vendida;

        Venta::create([
            'producto_id' => $producto->codigo,
            'cantidad_vendida' => $request->cantidad_vendida,
            'precio_unitario' => $producto->precio,
            'total' => $total,
            'fecha' => now(),
        ]);

        // Actualizar stock
        $producto->cantidad -= $request->cantidad_vendida;
        $producto->save();

        return redirect()->route('ventas.create')->with('success', 'Venta registrada correctamente');
    }
}
