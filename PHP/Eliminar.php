<?php
$conexioon = new mysqli("localhost","root","","main");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM inscripciones WHERE id = '$id'";
    $resultado = $conexioon->query($query);

    if ($resultado) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro.";
    }
}
?>
