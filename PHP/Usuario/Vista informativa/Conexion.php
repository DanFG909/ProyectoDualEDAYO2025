<?php
$servername = "localhost";
$username = "root"; // usuario por defecto en XAMPP
$password = ""; // vacío por defecto
$dbname = "icati pruebas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}
?>