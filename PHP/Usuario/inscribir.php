<?php
header('Content-Type: application/json; charset=utf-8');

$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

if (!$data || 
!isset($data["curso_id"]) || 
!isset($data["nombre"]) || 
!isset($data["apellidoPaterno"]) || 
!isset($data["apellidoMaterno"]) || 
!isset($data["numTelefono"]) || 
!isset($data["email"])) {
    echo json_encode(["error" => "Datos incompletos"]);
    exit;
}
$curso_id = $data["curso_id"];
$nombre = $data["nombre"];
$apellidoPaterno = $data["apellidoPaterno"];
$apellidoMaterno = $data["apellidoMaterno"];
$numTelefono = $data["numTelefono"];
$email = $data["email"];

$host = 'localhost';
$user = 'root';
$pass = '';
$base_prueba = 'base_prueba';

$mysqli = new mysqli($host, $user, $pass, $base_prueba);

if ($mysqli->connect_errno) {
    echo json_encode(["error" => "Error DB"]);
    exit;
}

$stmt = $mysqli->prepare(
    "INSERT INTO inscripciones (curso_id, nombre, apellidoPaterno, apellidoMaterno, numTelefono, email) 
     VALUES (?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param("isssss", $curso_id, $nombre, $apellidoPaterno, $apellidoMaterno, $numTelefono, $email);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => "No se pudo registrar"]);
}

$stmt->close();
$mysqli->close();
