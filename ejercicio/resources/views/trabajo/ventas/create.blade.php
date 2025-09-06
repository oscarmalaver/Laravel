<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venta</title>
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

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 400px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #444;
        }

        select, input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            width: 100%;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #218838;
        }

        .success {
            color: green;
            margin-bottom: 15px;
        }
        .button-new {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .button-new:hover {
            background-color: #0056b3;
        }
    </style>
</head >
<body >
    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif
<div style="display: flex; justify-content: center; align-items: center; ">
    <form method="POST" action="{{ route('ventas.storeWeb') }}" >
        @csrf
<h2 style="text-align: center;">Registrar Venta</h2>
@if ($errors->has('stock'))
    <div style="color:red; text-align:center; margin-bottom:10px;">
        {{ $errors->first('stock') }}
    </div>
@endif

        <label>Producto:</label>
        <select name="producto_id">
            @foreach($productos as $p)
                <option value="{{ $p->codigo }}">{{ $p->nombre }} ({{ $p->cantidad }} disponibles)</option>
            @endforeach
        </select>

        <label>Cantidad:</label>
        <input type="number" name="cantidad_vendida">

        <button type="submit">Registrar Venta</button>
        <div style="text-align: center; margin-top: 20px;">
    <a href="{{ route('ventas.vistaIndex') }}" class="button-new">Volver al Menú</a>
</div>
    </form>
    @if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

</body>
</html>
