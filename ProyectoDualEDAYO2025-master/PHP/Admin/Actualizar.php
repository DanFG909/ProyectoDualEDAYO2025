<?php
include("conexion.php");
$conexioon = new mysqli("localhost","root","","main");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['Nombre'];
    $apellidos = $_POST['Apellidos'];
    $correo = $_POST['Correo'];
    $tipo = $_POST['Tipo'];

    $query = "UPDATE usuarios_admin SET 
              Nombre='$nombre', 
              Apellidos='$apellidos', 
              Correo='$correo',
              Tipo='$tipo'
              WHERE id=$id";

    if ($conexioon->query($query)) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro.";
    }

    header("Location: VistaMain.php");
    exit();
}
?>
