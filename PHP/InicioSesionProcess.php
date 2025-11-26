<?php
session_start();
include('conexion.php');

$correo = $_POST['Correo'];
$password = $_POST['Contraseña'];

$sql = "SELECT * FROM users WHERE Correo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    if (password_verify($password, $usuario['Contraeña'])) {
        $_SESSION['Nombre'] = $usuario['Nombre'];
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Contraseña incorrecta.";
        header("Location: Inicio_Sesion.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Correo no registrado.";
    header("Location: Inicio_Sesion.php");
    exit();
}
?>