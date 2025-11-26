<?php
include("conexion.php");

if (!isset($_GET['id'])) {
    die("No se recibió el parámetro id.");
}

$id = intval($_GET['id']);

$sql = "SELECT contenido, tipo_mime FROM imagenes_cursos WHERE curso_id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($imagen, $tipo);
    $stmt->fetch();

    if (!empty($imagen)) {
        $tipo = $tipo ?: "image/jpeg";
        header("Content-Type: $tipo");
        echo $imagen;
        exit();
    } else {
        header("Content-Type: image/png");
        readfile("no_imagen.png");
        exit();
    }
} else {
    header("Content-Type: image/png");
    readfile("no_imagen.png");
    exit();
}

$stmt->close();
$conexion->close();
?>
