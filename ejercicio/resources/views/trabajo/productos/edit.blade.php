<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .button-new {
            display: inline-block;
            padding: 10px 15px;
            background-color:  #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #555;
        }
        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 15px;
        }
        textarea {
            resize: none;
            height: 70px;
        }
        button {
            background: #007bff;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Producto</h2>
        <form method="POST" action="{{ route('productos.update', $producto->codigo) }}">
            @csrf
            @method('PUT')

            <label>Nombre:</label>
            <input type="text" name="nombre" value="{{ $producto->nombre }}">

            <label>Descripción:</label>
            <textarea name="descripcion">{{ $producto->descripcion }}</textarea>

            <label>Cantidad:</label>
            <input type="number" name="cantidad" value="{{ $producto->cantidad }}">

            <label>Precio:</label>
            <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}">

            <button type="submit">Actualizar</button>
            <div style="text-align: center; margin-top: 20px;">
    <a href="{{ route('productos.vistaIndex') }}" class="button-new">Volver al Menú</a>
</div>
        </form>
    </div>
</body>
</html>
