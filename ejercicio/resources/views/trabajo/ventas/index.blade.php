<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Ventas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fc;
            padding: 40px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
        }

        a:hover {
            background: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            text-align: center;
        }

        th {
            background: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:hover {
            background: #e0f7ff;
        }
    </style>
</head>
<body>

    <h2>Listado de Ventas</h2>
    <a href="{{ route('ventas.create') }}">Registrar nueva venta</a>

    <table>
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
            <td>${{ number_format($v->precio_unitario, 2) }}</td>
            <td>${{ number_format($v->total, 2) }}</td>
<td>{{ \Carbon\Carbon::parse($v->fecha)->format('d/m/Y H:i:s') }}</td>
        </tr>
        @endforeach
    </table>
<div style="text-align: center; margin-top: 20px;">
    <a href="{{ route('menu') }}" class="btn btn-secondary">Volver al Menú</a>
</div>

</body>
</html>
