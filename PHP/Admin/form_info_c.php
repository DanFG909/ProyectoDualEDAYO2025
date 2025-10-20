<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../CSS/Style_curs.css" rel="stylesheet">
        <title>Agregar Cursos</title>
        <?php
include("conexion.php");
if (!isset($_GET['id'])) {
    die("No se proporcionó un ID.");
}
$id = intval($_GET['id']);

$sql = "SELECT * FROM Cursos WHERE id = $id";
$resultado = $conexion->query($sql);
if (!$resultado) {
    die("Error en la consulta: " . $conexion->error . "<br>SQL: " . $sql);
}
$curso = $resultado->fetch_assoc();
if (!$curso) {
    die("No se encontró el curso con ID $id.");
}
?>
    </head>
    <body>
        <section>
            <form>
                <label>ID del curso</label>
                <input type=text value="<?=$curso['id'] ?>" readonly>
                <br>
                <label>Nombre del curso </label>
                <input type=text value="<?=$curso['Nombre'] ?>" readonly>
                <br>
                <img src="imagen.php?id=<?= $curso['id'] ?>" alt="Imagen del curso" style="max-width:300px; max-height:300px;">
                <label>Informacion del curso</label>
                <input type=text value="<?=$curso['Informacion'] ?>" readonly>
                <br>
                <a href="Cursos.php"> <button >Regresar</button></a>

            </form>
        </section>
    </body>
</html>