<?php
include "Conexion.php";

$name= $_POST['nombre'];
$corr= $_POST['correo'];
$passw = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);


$query = "INSERT INTO usuarios (nombre, correo, password) VALUES ('$name', '$corr', '$passw')";
$resultado = $conn->query($query);

if ($resultado) {
        header("Location: Cursos.php"); // Redireccion
        
    } else {
        echo "Error al agregar el usuario" . $conn->error;
    }
?>