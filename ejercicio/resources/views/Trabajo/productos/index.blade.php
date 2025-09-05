<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Listado de Productos</h2>
<a href="{{ route('productos.create') }}">Nuevo Producto</a>
<table border="1">
    <tr>
        <th>Código</th><th>Nombre</th><th>Descripción</th><th>Cantidad</th><th>Precio</th><th>Acciones</th>
    </tr>
    @foreach($productos as $p)
    <tr>
        <td>{{ $p->codigo }}</td>
        <td>{{ $p->nombre }}</td>
        <td>{{ $p->descripcion }}</td>
        <td>{{ $p->cantidad }}</td>
        <td>{{ $p->precio }}</td>
        <td><a href="{{ route('productos.edit', $p->codigo) }}">Editar</a></td>
    </tr>
    @endforeach
</table>

</body>
</html>