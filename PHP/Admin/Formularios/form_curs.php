<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
    <link href="../../../CSS/Style_curs.css" rel="stylesheet">

        <title>Agregar cursos</title>
    </head>
     <body>
            <section>
                <form method="post" action="" enctype="multipart/form-data">
                    <label>Nombre del curso</label>
                    <input class="controls" type="text" name="nomb" id="nomb" placeholder="Ingrese el nombre del curso " >
                    <br>
                     <label>Informacion del curso</label>
                    <input class="controls" type="text" name="info" id="info" placeholder="Ingrese la Informacion del curso " >
                    <br>
                    <label name="Modalidad">Modalidad</label> 
                    <select name="Modalidad">
                     <option values="CEM">CEM</option> 
                     <option values="CAE">CAE</option> 
                     <option values="CEA">CEA</option>    
                    </select>

                      <label>Imagen para el curso</label> 
                       <input type="file" name="imagen" accept="image/*" required>
                       <br><br>
                       <input class="button" type="submit" name="agregar" placeholder="Agregar curso">
                       <a href="../Tablas/Cursos.php" class="button">Regresar</a>
                    </form>
            </section>
            <?php
include("conexion.php");

if (isset($_POST['agregar'])) {
    $nombre = $_POST['nomb'];
    $info = $_POST['info'];
    $mod= $_POST['Modalidad'];
    $imagen = $_FILES['imagen'];

    // Validar la imagen
    $mime = mime_content_type($imagen['tmp_name']);
    if (strpos($mime, 'image/') !== 0) {
        die(" El archivo no es una imagen válida.");
    }

    $contenido = file_get_contents($imagen['tmp_name']);
    $nombre_img = $imagen['name'];

    // Insertar curso
    $stmtCurso = $conexion->prepare("INSERT INTO cursos (Nombre, Informacion, Modalidad) VALUES (?, ?, ?)");
    $stmtCurso->bind_param("sss", $nombre, $info, $mod);
    $stmtCurso->execute();

    if ($stmtCurso->affected_rows > 0) {
        $curso_id = $stmtCurso->insert_id;

        // Insertar imagen relacionada al curso
        $stmtImg = $conexion->prepare("INSERT INTO imagenes_cursos (curso_id, nombre_original, tipo_mime, contenido) VALUES (?, ?, ?, ?)");
        $stmtImg->bind_param("isss", $curso_id, $nombre_img, $mime, $contenido);
        $stmtImg->send_long_data(3, $contenido);
        $stmtImg->execute();

        if ($stmtImg->affected_rows > 0) {
            echo "<script>alert(' Curso e imagen guardados correctamente.');</script>";
        } else {
            echo "<script>alert(' Curso guardado, pero falló la imagen.');</script>";
        }

    } else {
        echo "<script>alert('Error al guardar el curso.');</script>";
    }
}
         ?>  
     </body>
</html>