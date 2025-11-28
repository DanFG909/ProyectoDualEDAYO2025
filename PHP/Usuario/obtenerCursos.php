<?php
header('Content-Type: application/json; charset=utf-8');

$host = 'localhost';
$user = 'root';
$pass = '';
$base_prueba = 'main';

$mysqli = new mysqli($host, $user, $pass, $base_prueba);

if ($mysqli->connect_errno) {
    http_response_code(500);
    echo json_encode(["error" => "DB connection failed"]);
    exit;
}

// cursos
$sql = "SELECT id, nombre, imagen, descripcion FROM cursos1 WHERE activo = 1 ORDER BY id";

if ($result = $mysqli->query($sql)) {
    $cursos1 = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($cursos1, JSON_UNESCAPED_UNICODE);
    $result->free();
} else {
    http_response_code(500);
    echo json_encode(["error" => "Query failed"]);
}

$mysqli->close();
