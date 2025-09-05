<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Listado de Ventas</h2>
<a href="{{ route('ventas.create') }}">Registrar nueva venta</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Producto</th>
        <th>Cantidad Vendida</th>
        <th>Precio Unitario</th>
        <th>Total</th>
        <th>Fecha</th>
    </tr>
    @foreach($ventas as $v)
    <tr>
        <td>{{ $v->id }}</td>
        <td>{{ $v->producto->nombre }}</td>
        <td>{{ $v->cantidad_vendida }}</td>
        <td>{{ $v->precio_unitario }}</td>
        <td>{{ $v->total }}</td>
        <td>{{ $v->fecha }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>