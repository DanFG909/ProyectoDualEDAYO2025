<?php
include("conexion.php");

echo "<h3>Depuración de descarga</h3>";

// 1. Verifica parámetros GET
if (!isset($_GET['user_id']) || !isset($_GET['tipo'])) {
    die("❌ Parámetros faltantes. user_id o tipo no recibidos.<br>");
}

$user_id = intval($_GET['user_id']);
$tipo = $_GET['tipo'];

echo "Parámetro user_id: $user_id<br>";
echo "Parámetro tipo: $tipo<br>";

// 2. Preparar consulta
$stmt = $conexion->prepare("SELECT nombre_original, tipo_mime, contenido FROM archivos WHERE user_id = ? AND tipo = ? LIMIT 1");
if (!$stmt) {
    die("Error al preparar la consulta: " . $conexion->error);
}

$stmt->bind_param("is", $user_id, $tipo);

$executed = $stmt->execute();
if (!$executed) {
    die("Error al ejecutar la consulta: " . $stmt->error);
}

$stmt->store_result();
$num = $stmt->num_rows;
echo "Número de filas encontradas: $num<br>";

if ($num === 0) {
    die(" No se encontró ningún archivo para este usuario y tipo.<br>");
}

// 3. Obtener resultados
$stmt->bind_result($nombre_archivo, $tipo_mime, $contenido);
$fetched = $stmt->fetch();
if (!$fetched) {
    die("Error al hacer fetch del resultado.<br>");
}

echo "Nombre del archivo: $nombre_archivo<br>";
echo "Tipo MIME: $tipo_mime<br>";
echo "Tamaño de contenido: " . strlen($contenido) . " bytes<br>";

// 4. Enviar headers y contenido
header("Content-Type: $tipo_mime");
header("Content-Disposition: attachment; filename=\"" . $nombre_archivo . "\"");
header("Content-Length: " . strlen($contenido));
echo $contenido;
exit;
?>
