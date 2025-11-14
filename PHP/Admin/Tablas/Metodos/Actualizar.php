<?php
$conexioon = new mysqli("localhost","root","","main");

if ($conexioon->connect_error) {
    die("Error de conexión: " . $conexioon->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id        = $_POST['id'];
    $nombre    = $_POST['Nombre'];
    $apellidos = $_POST['Apellidos'];
    $correo    = $_POST['Correo'];
    $tipo      = $_POST['Tipo'];

    $query = "UPDATE usuarios_admin SET 
              Nombre='$nombre', 
              Apellidos='$apellidos', 
              Correo='$correo',
              Tipo='$tipo'
              WHERE id=$id";

    if ($conexioon->query($query)) {
        // ✅ Redirige con parámetro de éxito
        header("Location: ../Usuarios.php?success=1");
        exit();
    } else {
        // ✅ Redirige con parámetro de error
        header("Location: ../Usuarios.php?success=0");
        exit();
    }
}
?>
