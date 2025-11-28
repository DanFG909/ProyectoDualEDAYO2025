<?php
include "Conexion.php";

$name= $_POST['nombre'];
$corr= $_POST['correo'];
$passw= $_POST['contraseña'];
$tel= $_POST['telefono'];
$municipio= $_POST['municipio'];

$query = "INSERT INTO users (Nombre, Correo, Contraseña, Telefono, Municipio) VALUES ('$name', '$corr', '$passw', '$tel', '$municipio')";
$resultado = $conn->query($query);

if ($resultado) {
        header("Location: /ProyectoDualEDAYO2025/PHP/index.php"); // Redireccion
        
    } else {
        echo "Error al agregar el usuario" . $conn->error;
    }
?>