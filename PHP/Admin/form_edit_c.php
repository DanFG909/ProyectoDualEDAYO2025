<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="../../CSS/Style_curs.css" rel="stylesheet">
    <title>Actualizar curso</title>
    <?php
     $id =$_GET['id'];
     $sql="SELECT * FROM cursos WHERE id=$id";
     $resultado=$conexion->query($sql);
     $usuario=$resultado->fetch_Assoc();
    ?>
</head>
<body>
<section>
    <form method="post" action="" enctype="multipart/form-data">
        <label>ID del curso:</label>
        <input type="hidden" name="id_curso" value="<?= $usuario['id']?>" >
        <label>Nombre del curso</label>
        <input class="controls" type="text" name="nomb" id="nomb" value="<?= $usuario['id']?>" placeholder="Ingrese el nombre del curso " required>
        <label>Información del curso</label>
        <input class="controls" type="text" name="info" id="info" value="<?= $usuario['id']?>" placeholder="Ingrese la información del curso " required>
        <label>Modalidad</label> 
        <select name="Modalidad">
            <option value="CEM">CEM</option> 
            <option value="CAE">CAE</option> 
            <option value="CEA">CEA</option>    
        </select>
        <label>Imagen para el curso</label> 
        <input type="file" name="imagen" accept="image/*" required>
        <br><br>
        <input class="button" type="submit" name="actualizar" value="Actualizar curso">
        <a href="Cursos.php"><button type="button">Regresar</button></a>
    </form>
</section>

<?php
include("conexion.php");

if (isset($_POST['actualizar'])) {
    $id = intval($_POST['id_curso']);
    $nombre = $_POST['nomb'];
    $info = $_POST['info'];
    $mod = $_POST['Modalidad'];
    $imagen = $_FILES['imagen'];

    // Validar imagen
    $mime = mime_content_type($imagen['tmp_name']);
    if (strpos($mime, 'image/') !== 0) {
        die("El archivo no es una imagen válida.");
    }

    $contenido = file_get_contents($imagen['tmp_name']);
    $nombre_img = $imagen['name'];

    // Actualizar curso
    $stmtCurso = $conexion->prepare("UPDATE cursos SET Nombre = ?, Informacion = ?, Modalidad = ? WHERE id = ?");
    $stmtCurso->bind_param("sssi", $nombre, $info, $mod, $id);
    $stmtCurso->execute();

    if ($stmtCurso->affected_rows >= 0) {
        // Verificar si ya existe una imagen para el curso
        $stmtCheck = $conexion->prepare("SELECT id FROM imagenes_cursos WHERE curso_id = ?");
        $stmtCheck->bind_param("i", $id);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();

        if ($result->num_rows > 0) {
            // Actualizar imagen existente
            $stmtImg = $conexion->prepare("UPDATE imagenes_cursos SET nombre_original = ?, tipo_mime = ?, contenido = ? WHERE curso_id = ?");
            $stmtImg->bind_param("sssi", $nombre_img, $mime, $contenido, $id);
        } else {
            // Insertar nueva imagen
            $stmtImg = $conexion->prepare("INSERT INTO imagenes_cursos (curso_id, nombre_original, tipo_mime, contenido) VALUES (?, ?, ?, ?)");
            $stmtImg->bind_param("isss", $id, $nombre_img, $mime, $contenido);
        }

        $stmtImg->send_long_data(3, $contenido); // importante para blobs
        $stmtImg->execute();

        echo "<script>alert('Curso e imagen actualizados correctamente.');</script>";
    } else {
        echo "<script>alert('Error al actualizar el curso.');</script>";
    }
}
?>
</body>
</html>
