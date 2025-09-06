<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fc;
            margin: 0;
            padding: 40px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s;
        }

        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Menú Principal</h1>
    <a href="{{ route('productos.vistaIndex') }}">Gestionar Productos</a>
    <a href="{{ route('ventas.vistaIndex') }}">Listado Venta</a>
</body>
</html>
