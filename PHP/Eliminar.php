<?php
include("conexion.php"); 

if (isset($_GET['Id'])) {
    $id = $_GET['ID'];

    $query = "DELETE FROM inscripciones WHERE id = '$id'";
    $resultado = $conn->query($query);

    if ($resultado) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro.";
    }
}
?>
