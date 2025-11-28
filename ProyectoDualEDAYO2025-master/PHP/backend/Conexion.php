<?php
$host = "localhost";
$user = "root";
$pass = ""; // Cambia si tienes contraseña
$db = "servidor";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>