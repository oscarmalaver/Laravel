<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Editar Producto</h2>
<form method="POST" action="{{ route('productos.update', $producto->codigo) }}">
    @csrf
    @method('PUT')
    Nombre: <input type="text" name="nombre" value="{{ $producto->nombre }}"><br>
    Descripción: <textarea name="descripcion">{{ $producto->descripcion }}</textarea><br>
    Cantidad: <input type="number" name="cantidad" value="{{ $producto->cantidad }}"><br>
    Precio: <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}"><br>
    <button type="submit">Actualizar</button>
</form>

</body>
</html>