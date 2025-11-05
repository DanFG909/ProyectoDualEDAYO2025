
<?php 
$conexion = new mysqli("localhost", "root", "", "servidor");

if ($conexion->connect_error) {
    die("Error de conexión");
}

// Lógica para marcar como enviado
if (isset($_GET['enviar'])) {
    $id = intval($_GET['enviar']);
    $conexion->query("UPDATE cliente SET Estado = 1 WHERE ID = $id");
    header("Location: tabla.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas CEA</title>
    <script src="ActualizarMensaje.js"></script>
    <link rel="stylesheet" href="Estilos/styletabla.css">
    <style>
    .enviado-label {
        font-weight: bold;
        color: green;
    }
    </style>
</head>
<body>

<center>
    <table border="8">
        <thead>
            <tr>
                <th><a href="Ingreso_Usuario.php">Cerrar Sesión</a></th>
                <th><a href="Index.php">Regresar</a></th>
                <th colspan="8">Lista de usuarios</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Municipio</td>
                <td>Correo</td>
                <td>Numero</td>
                <td>Medio</td>
                <td>Cursos</td>
                <td>Estatus</td>
            </tr>
            <?php
                include("Conexion.php");
                $query = "SELECT * FROM cliente";
                $resultado = $conn->query($query);
                while ($row = $resultado->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['Nombre']; ?></td>
                <td><?php echo $row['Municipio']; ?></td>
                <td><?php echo $row['Correo']; ?></td>
                <td><?php echo $row['Numero']; ?></td>
                <td><?php echo $row['Medio']; ?></td>
                <td><?php echo $row['Cursos']; ?></td>

                <?php
                if ($row['Medio'] == "Correo") {
                    if ($row['Estado'] == 0) {
                    
                ?>
                    <td>
                    <?php
$nombre = $row['Nombre'];
$correo = $row['Correo']; // Asegúrate de que el campo exista en tu base de datos
$id = $row['ID'];

$asunto = "Información_solicitada_ICATI";
$mensaje = "¡Hola, $nombre!%0D%0A%0D%0ANos comunicamos desde El Instituto de Capacitación y Adiestramiento para el Trabajo Industrial (ICATI) debido a que usted solicitó la siguiente información.%0D%0A%0D%0AAtentamente,%0D%0AICATI%0D%0A";
$mailto = "mailto:$correo?subject=" . urlencode($asunto) . "&body= $mensaje https://drive.google.com/file/d/1esLwCGnZAKAXgmJoUIhXPG4mcfQ47CP_/view?usp=drive_link" ;
?>

<a href="<?php echo $mailto; ?>" target="_blank"  onclick="setTimeout(function(){ window.location.href='tabla.php?enviar=<?php echo $id; ?>'; }, 2000);">
    <button type="button">Enviar Correo</button>
</a>
                    </td>
                    <?php
                    } //esta 
                    else {
                ?>
                    <td><span class="enviado-label">Enviado permanentemente</span></td>
                <?php
                    }
                    ?>
                    
                <?php
                } elseif ($row['Medio'] == "WhatsApp") {
                    if ($row['Estado'] == 0) { //esta
                ?>
                    <td>
                    <?php
$nombre = $row['Nombre'];
$numero = $row['Numero'];
$id = $row['ID'];
$mensaje = "¡Hola, $nombre! Nos comunicamos desde El Instituto de Capacitación y Adiestramiento para el Trabajo Industrial (ICATI) debido a que usted solicitó la siguiente información:
    https://drive.google.com/file/d/1esLwCGnZAKAXgmJoUIhXPG4mcfQ47CP_/view?usp=drive_link";
$mensajeCodificado = urlencode($mensaje);
$urlWhatsapp = "https://wa.me/$numero?text=$mensajeCodificado";
?>

<a href="<?php echo $urlWhatsapp; ?>" target="_blank" onclick="setTimeout(function(){ window.location.href='tabla.php?enviar=<?php echo $id; ?>'; }, 2000);">
    <button type="button">Enviar WhatsApp</button>
</a>
                    </td>
                <?php
                    } //esta 
                    else {
                ?>
                    <td><span class="enviado-label">Enviado permanentemente</span></td>
                <?php
                    }
                } else {
                    echo "<td>Sin medio</td>";
                }
                ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</center>

</body>
</html>
