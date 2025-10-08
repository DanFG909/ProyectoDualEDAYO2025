<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $curp = $_POST['CURP'];
    $nombre = $_POST['Nombre'];
    $correo = $_POST['Correo'];
    $telefono = $_POST['Telefono'];
    $forma_pago = $_POST['Forma_de_Pago'];
    $documentos = $_POST['Documentos'];

    $query = "UPDATE inscripciones SET 
              CURP='$curp',
              Nombre='$nombre', 
              Correo='$correo', 
              Telefono='$telefono', 
              Forma_de_Pago='$forma_pago', 
              Documentos='$documentos' 
              WHERE id=$id";

    if ($conn->query($query)) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro.";
    }

    header("Location: index.php");
    exit();
}
?>
