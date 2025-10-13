<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $curso_id = intval($_GET['id']); // Sanitiza el ID

    $stmt = $conexion->prepare("SELECT tipo_mime, contenido FROM imagenes_cursos WHERE curso_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $curso_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($mime, $contenido);
            $stmt->fetch();

            header("Content-Type: $mime");
            // Opcional: evitar cache para desarrollo
            header("Cache-Control: no-cache, no-store, must-revalidate");
            header("Pragma: no-cache");
            header("Expires: 0");

            echo $contenido;
            exit;
        }
    }
}

// Imagen por defecto
$defaultImage = "no-imagen.png";

if (file_exists($defaultImage)) {
    header("Content-Type: image/png");
    readfile($defaultImage);
} else {
    // En caso de que no exista la imagen por defecto
    header("HTTP/1.1 404 Not Found");
    echo "No image available";
}
exit;
?>
