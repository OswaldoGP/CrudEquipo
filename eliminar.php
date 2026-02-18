<?php
include("config/conexion.php");

$id=$_GET['id'];
$conn->query("CALL sp_eliminar_componente($id)");

header("Location: index.php");
?>
