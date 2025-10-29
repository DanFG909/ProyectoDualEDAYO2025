<?php 
$conexioon = new mysqli("localhost", "root", "", "main");

$tipoSeleccionado = $_GET['opciones_modalidad'] ?? '';
$tipoSeleccionado2 = $_GET['opciones_periodo'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Inscripciones</title>
    <link rel="stylesheet" href="../../CSS/Inscripciones.css">
</head>
<body>

    <button onclick="window.parent.cerrarContenedor('contenedor')">
        ⓧ
    </button>

    <form method="GET" action="">
    <select name="opciones_periodo">
        <option value="" disabled selected hidden>Periodos</option>
        <option value="Mensual" <?php if($tipoSeleccionado2 == "Mensual") echo "selected"; ?>>Mensual</option>
        <option value="Anual" <?php if($tipoSeleccionado2 == "Anual") echo "selected"; ?>>Anual</option>
    </select>

    <select name="opciones_modalidad">
        <option value="" disabled selected hidden>Modalidad</option>
        <option value="CEA" <?php if($tipoSeleccionado == "CEA") echo "selected"; ?>>CEA</option>
        <option value="CEM" <?php if($tipoSeleccionado == "CEM") echo "selected"; ?>>CEM</option>
        <option value="CAE" <?php if($tipoSeleccionado == "CAE") echo "selected"; ?>>CAE</option>
    </select>

    <button type="submit">Filtrar</button>
    <a href="inscripciones.php"><button type="button">Borrar Filtros</button></a>
</form>


   <div>
        <form action="Buscar_ins.php" method="GET">
            <input type="text" name="buscar_input" placeholder="Buscar por nombre, CURP, etc.">
            <button type="submit">Buscar</button>
        </form>
        <a href="form_desc.php"><button>Descargar</button></a>
    </div>

    <div>
    <h2>Usuarios Inscritos</h2>

    <table border="1" cellpadding="6" cellspcing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>CURP</th>
                <th>Nombre<br>(Completo)</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Periodo</th>
                <th>Modalidad</th>
                <th>Forma de pago</th>
                <th>Documentos</th>
                <th>Estatus</th>
                <th>Notificación</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($tipoSeleccionado && $tipoSeleccionado2) {
                $stmt = $conexioon->prepare("SELECT * FROM inscripciones WHERE Modalidad = ? AND Periodo = ?");
                $stmt->bind_param("ss", $tipoSeleccionado, $tipoSeleccionado2);
                $stmt->execute();
                $resultado = $stmt->get_result();
            } elseif ($tipoSeleccionado) {
                $stmt = $conexioon->prepare("SELECT * FROM inscripciones WHERE Modalidad = ?");
                $stmt->bind_param("s", $tipoSeleccionado);
                $stmt->execute();
                $resultado = $stmt->get_result();
            } elseif ($tipoSeleccionado2) {
                $stmt = $conexioon->prepare("SELECT * FROM inscripciones WHERE Periodo = ?");
                $stmt->bind_param("s", $tipoSeleccionado2);
                $stmt->execute();
                $resultado = $stmt->get_result();
            } else {
                $resultado = $conexioon->query("SELECT * FROM inscripciones");
            }

            while ($row = $resultado->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['CURP']; ?></td>
                    <td><?php echo $row['Nombre']; ?></td>
                    <td><?php echo $row['Correo']; ?></td>
                    <td><?php echo $row['Telefono']; ?></td>
                    <td><?php echo $row['Periodo']; ?></td>
                    <td><?php echo $row['Modalidad']; ?></td>
                    <td><?php echo $row['Forma_de_Pago']; ?></td>
                    <td><?php echo $row['Documentos']; ?></td>
                    <td>
                        <?php if ($row['Estatus'] == 0) { ?>
                            <form method="GET" action="Validacion.php">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit">Validar</button>
                            </form>
                        <?php } else { ?>
                            <span style="color: green; font-size: 24px;">✓</span>
                        <?php } ?>
                    </td>
                    <td>
                        <form action="Notificacion_inscripciones" method="post" onsubmit="return confirm('Enviar Notficacion a <?php echo htmlspecialchars(addslashes($r['Nombre'])); ?> )">
                            <input type="hidden" >
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

  </body>
</html>