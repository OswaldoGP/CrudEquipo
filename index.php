<?php include("config/conexion.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Componentes electrónicos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<nav class="navbar navbar-dark mb-4">
    <div class="container">
        <span class="navbar-brand">CRUD Componentes electronicos</span>
    </div>
</nav>

<div class="container">
<div class="card p-4">

<div class="d-flex justify-content-between mb-3">
    <h2>Lista de componentes</h2>
    <a href="agregar.php" class="btn btn-morado">+ Agregar</a>
</div>

<table class="table table-hover">
<thead>
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Cantidad</th>
    <th>Tipo</th>
    <th>Descripción</th>
    <th>Acciones</th>
</tr>
</thead>

<tbody>
<?php
$result = $conn->query("CALL sp_listar_componentes()");
while($row = $result->fetch_assoc()){
?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['nombre'] ?></td>
    <td><?= $row['cantidad'] ?></td>
    <td><?= $row['tipo'] ?></td>
    <td><?= $row['descripcion'] ?></td>
    <td>
        <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
        <a href="eliminar.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">Eliminar</a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>

</div>
</div>

</body>
</html>
