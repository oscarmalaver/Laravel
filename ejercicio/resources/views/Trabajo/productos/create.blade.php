<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Crear Producto</h2>
<form method="POST" action="{{ route('productos.store') }}">
    @csrf
    Código: <input type="text" name="codigo"><br>
    Nombre: <input type="text" name="nombre"><br>
    Descripción: <textarea name="descripcion"></textarea><br>
    Cantidad: <input type="number" name="cantidad"><br>
    Precio: <input type="number" step="0.01" name="precio"><br>
    <button type="submit">Guardar</button>
</form>

</body>
</html>