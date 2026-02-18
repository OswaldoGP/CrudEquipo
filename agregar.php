<?php
include("config/conexion.php");

if($_POST){
    $nombre=$_POST['nombre'];
    $cantidad=$_POST['cantidad'];
    $tipo=$_POST['tipo'];
    $descripcion=$_POST['descripcion'];

    $conn->query("CALL sp_agregar_componente('$nombre',$cantidad,'$tipo','$descripcion')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Agregar componente</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="container mt-5">
<div class="card p-4">
<h2>Agregar componente</h2>

<form method="POST">

<div class="mb-3">
<label>Nombre</label>
<input type="text" name="nombre" class="form-control" required>
</div>

<div class="mb-3">
<label>Cantidad</label>
<input type="number" name="cantidad" class="form-control" required>
</div>

<div class="mb-3">
<label>Tipo</label>
<select name="tipo" class="form-select">
<option>Activo</option>
<option>Pasivo</option>
</select>
</div>

<div class="mb-3">
<label>Descripción</label>
<textarea name="descripcion" class="form-control"></textarea>
</div>

<button class="btn btn-morado">Guardar</button>
<a href="index.php" class="btn btn-secondary">Volver</a>

</form>
</div>
</div>

</body>
</html>
