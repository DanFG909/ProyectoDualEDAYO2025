<?php
if (!isset($_GET['tipo']) || !isset($_GET['id'])) {
    die("Parámetros inválidos.");
}

$tipo = $_GET['tipo'];
$id = intval($_GET['id']);

include("conexion.php");

// Consulta para obtener las rutas relativas desde la BD
$query = mysqli_query($conexion, "SELECT ine_pdf, comprobante_pdf FROM users WHERE id = $id");
if (!$query || mysqli_num_rows($query) === 0) {
    die("Usuario no encontrado.");
}

$row = mysqli_fetch_assoc($query);

// Según el tipo, obtener ruta relativa y nombre para descarga
if ($tipo === 'ine') {
    $ruta_relativa = $row['ine_pdf']; // ej: "uploads/68e6e5dac3867_ine.pdf"
    $nombre_descarga = 'INE.pdf';
} elseif ($tipo === 'comprobante') {
    $ruta_relativa = $row['comprobante_pdf'];
    $nombre_descarga = 'Comprobante.pdf';
} else {
    die("Tipo de archivo inválido.");
}

// Construir la ruta absoluta correcta teniendo en cuenta la carpeta PROYECTODUALEDAYO2025 en mayúsculas
$ruta_absoluta = __DIR__ . '/../' . $ruta_relativa;

// Depuración: imprime la ruta que se está usando (puedes comentar esto cuando funcione)
echo "Ruta absoluta que PHP intenta abrir: " . $ruta_absoluta . "<br>";
if (!file_exists($ruta_absoluta)) {
    die("Archivo no encontrado en la ruta especificada.");
}

// Headers para descargar el archivo
header('Content-Description: File Transfer');
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $nombre_descarga . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($ruta_absoluta));
readfile($ruta_absoluta);
exit;
?>
