<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="../../../CSS/Style_curs.css" rel="stylesheet">
    <title>Detalles del Curso</title>

    <?php
    include("conexion.php");

    if (!isset($_GET['id'])) {
        die("No se proporcionó un ID.");
    }

    $id = intval($_GET['id']);

    // Usamos consulta preparada por seguridad
    $sql = "SELECT id, Nombre, Informacion FROM Cursos WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $curso = $resultado->fetch_assoc();

    if (!$curso) {
        die("No se encontró el curso con ID $id.");
    }

    $stmt->close();
    ?>
</head>
<body>
    <section>
        <form>
            <label>ID del curso</label><br>
            <input type="text" value="<?= htmlspecialchars($curso['id']) ?>" readonly><br>

            <label>Nombre del curso</label><br>
            <input type="text" value="<?= htmlspecialchars($curso['Nombre']) ?>" readonly><br>

            <label>Imagen del curso</label><br>
            <img src="imagen.php?id=<?= urlencode($curso['id']) ?>" 
                 alt="Imagen del curso" 
                 style="max-width:300px; max-height:300px; border:5px solid #080101ff; border-radius:5px; display:block; margin:auto;">

            <label>Información del curso</label><br>
            <input type="text" value="<?= htmlspecialchars($curso['Informacion']) ?>" readonly><br><br>

            <a href="../Tablas/Cursos.php" class="button">Regresar</a>
        </form>
    </section>
</body>
</html>
