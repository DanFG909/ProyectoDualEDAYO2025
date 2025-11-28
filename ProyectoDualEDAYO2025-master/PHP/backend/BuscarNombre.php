<?php
$conexion = new mysqli("localhost", "root", "", "servidor");

if ($conexion->connect_error) {
    die("Error de conexión");
}

$id = isset($_GET['Codigo_Usuario']) ? intval($_GET['Codigo_Usuario']) : 0;

$sql = "SELECT Nombre FROM ingreso_usuario WHERE Codigo_Usuario= $id";
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    echo $fila['Nombre']; // Solo texto
} else {
    echo "NO_ENCONTRADO";
}

$conexion->close();
?>