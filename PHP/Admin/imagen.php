<?php 
include("conexion.php"); 
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT contenido, tipo_mime FROM imagenes_cursos WHERE curso_id = 5";
    $stmt = $conexion->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($imagen, $tipo);
            $stmt->fetch();
            var_dump($tipo);
            exit();
            header("Content-Type: $tipo");
            echo $imagen;
            exit();
        } else {
            echo "No hay una imagen relacionada a este curso. Por favor, ingrese una.";
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }
} else {
    echo "No se recibió el parámetro id.";
}
?>
