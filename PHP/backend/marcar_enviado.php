<?php
$conexion = new mysqli("localhost", "root", "", "servidor");

if ($conexion->connect_error) {
    http_response_code(500);
    echo "Error de conexión";
    exit;
}

$conexion->query("UPDATE usuarios SET estado_notificacion = 'Enviado' WHERE estado_notificacion = 'pendiente'");
$conexion->close();

echo "Estado de todos actualizado";