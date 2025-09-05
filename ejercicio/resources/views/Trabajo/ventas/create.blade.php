<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Registrar Venta</h2>
@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif
<form method="POST" action="{{ route('ventas.store') }}">
    @csrf
    Producto:
    <select name="producto_id">
        @foreach($productos as $p)
            <option value="{{ $p->codigo }}">{{ $p->nombre }} ({{ $p->cantidad }} disponibles)</option>
        @endforeach
    </select><br>
    Cantidad: <input type="number" name="cantidad_vendida"><br>
    <button type="submit">Registrar Venta</button>
</form>

</body>
</html>