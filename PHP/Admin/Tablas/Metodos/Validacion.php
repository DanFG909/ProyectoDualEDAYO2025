<?php
$conexion = new mysqli("localhost", "root", "", "main");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE inscripciones SET Estatus = 1 WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: Inscripciones.php"); 
exit;
?>
