<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }

        header {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            color: #333;
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

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        th {
            background-color: #007bff;
            color: white;
            padding: 12px 15px;
            text-align: left;
        }

        td {
            padding: 10px 15px;
            border-bottom: 1px solid #eee;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e0f7ff;
        }

        .actions {
            white-space: nowrap;
        }

        .button-edit {
            color: #28a745;
            margin-right: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .button-edit:hover {
            text-decoration: underline;
        }

        .form-delete {
            display: inline;
        }

        .button-delete {
            background: none;
            border: none;
            color: #dc3545;
            font-weight: bold;
            text-decoration: underline;
            cursor: pointer;
        }

        .button-delete:hover {
            color: #bd2130;
        }
    </style>
</head>
<body>
    <header>
        <h1>Lista de Productos</h1>
        <a href="{{ route('productos.create') }}" class="button-new">Nuevo Producto</a>
    </header>
@if(session('success'))
    <div style="color:green; text-align:center; margin-bottom:15px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="color:red; text-align:center; margin-bottom:15px;">
        {{ session('error') }}
    </div>
@endif

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->codigo }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>${{ $producto->precio }}</td>
                <td>{{ $producto->cantidad }}</td>
                <td class="actions">
                    <a href="{{ route('productos.edit', $producto) }}" class="button-edit">Editar</a>
                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="form-delete"
                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">

                        @csrf @method('DELETE')
                        <button type="submit" class="button-delete">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div style="text-align: center; margin-top: 20px;">
    <a href="{{ route('menu') }}" class="button-new">Volver al Menú</a>
</div>

</body>
</html>
