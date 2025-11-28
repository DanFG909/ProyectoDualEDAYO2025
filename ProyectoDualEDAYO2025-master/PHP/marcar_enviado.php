<?php
include("Admin/conexion.php");
if ($conexion->connect_error) {
    http_response_code(500);
    echo "Error de conexión";
    exit;
}

$conexion->query("UPDATE users SET estado = '1' WHERE estado = '0'");
$conexion->close();

echo "Estado de todos actualizado";