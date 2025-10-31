<?php
include('conexion.php');

if (isset($_POST['id'])) {
  $id = intval($_POST['id']);

  $sql = "UPDATE cursos SET activo = 0 WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo "<script>alert('Curso deshabilitado correctamente'); window.location='cursos.php';</script>";
  } else {
    echo "<script>alert('Error al deshabilitar el curso'); window.location='cursos.php';</script>";
  }

  $stmt->close();
}
$conn->close();
?>
