<?php
include('conexion.php');

$correo = $_POST['correo'];
$codigo = $_POST['codigo'];
$nueva_pass = password_hash($_POST['nueva_pass'], PASSWORD_DEFAULT);

$sql = "SELECT * FROM usuarios WHERE correo = ? AND codigo_recuperacion = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $correo, $codigo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $update = $conn->prepare("UPDATE usuarios SET password = ?, codigo_recuperacion = NULL WHERE correo = ?");
    $update->bind_param("ss", $nueva_pass, $correo);
    $update->execute();
    echo "<script>
    alert('Contraseña actualizada correctamente en $correo');
    window.location.href = 'Inicio_Sesion.php';
</script>";
} else {
    echo "<p>Código o correo incorrecto.</p>";
}
?>