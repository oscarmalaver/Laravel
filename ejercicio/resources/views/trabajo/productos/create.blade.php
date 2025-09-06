<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <style>
        
           .button-new {
            display: inline-block;
            padding: 10px 15px;
            background-color:  #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .button-new:hover {
            background-color: #0056b3;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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
            background: #28a745;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Crear Producto</h2>
        @if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form method="POST" action="{{ route('productos.storeWeb') }}">
            @csrf
            <label>Código:</label>
            <input type="text" name="codigo">

            <label>Nombre:</label>
            <input type="text" name="nombre">

            <label>Descripción:</label>
            <textarea name="descripcion"></textarea>

            <label>Cantidad:</label>
            <input type="number" name="cantidad">

            <label>Precio:</label>
            <input type="number" step="0.01" name="precio">

            <button type="submit">Guardar</button>
            <div style="text-align: center; margin-top: 20px;">
    <a href="{{ route('productos.vistaIndex') }}" class="button-new">Volver al Menú</a>
</div>
        </form>
    </div>
</body>
</html>
