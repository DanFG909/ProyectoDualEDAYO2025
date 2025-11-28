<?php
session_start();
include('Conexion.php');

$correo = $_POST['correo'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE correo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    if (password_verify($password, $usuario['password'])) {
        $_SESSION['usuario'] = $usuario['nombre'];
        header("Location: cursos.php");
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