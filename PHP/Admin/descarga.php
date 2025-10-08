
<?php
// Valida la entrada
if (!isset($_GET['tipo']) || !isset($_GET['id'])) {
    die("Parámetros inválidos.");
}

$tipo = $_GET['tipo']; 
$id = intval($_GET['id']);

include("conexion.php");

$query = mysqli_query($conexion, "SELECT ine_pdf, comprobante_pdf FROM users WHERE id = $id");
if (!$query || mysqli_num_rows($query) === 0) {
    die("Usuario no encontrado.");
}

$row = mysqli_fetch_assoc($query);

if ($tipo === 'ine') {
    $ruta = $row['ine_pdf'];
    $nombre_descarga = 'INE.pdf';
} elseif ($tipo === 'comprobante') {
    $ruta = $row['comprobante_pdf'];
    $nombre_descarga = 'Comprobante.pdf';
} else {
    die("Tipo de archivo inválido.");
}

// Verifica qu exista
if (!file_exists($ruta)) {
    die("Archivo no encontrado.");
}

// Descargar
header('Content-Description: File Transfer');
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $nombre_descarga . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($ruta));
readfile($ruta);
exit;
?>
