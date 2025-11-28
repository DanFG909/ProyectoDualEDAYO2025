<?php 
$conexion = new mysqli("localhost", "root", "", "main");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$tipoSeleccionado  = $_GET['opciones_modalidad'] ?? '';
$tipoSeleccionado2 = $_GET['opciones_periodo'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Inscripciones</title>
    <link rel="stylesheet" href="../../../CSS/Inscripciones.css">
</head>
<body>

    <button onclick="window.parent.cerrarContenedor('contenedor')" aria-label="Cerrar ventana">
        ⓧ
    </button>

    <form method="GET" action="">
        <label for="periodo">Periodo:</label>
        <select id="periodo" name="opciones_periodo">
            <option value="" disabled selected hidden>Selecciona un periodo</option>
            <option value="Mensual" <?php if($tipoSeleccionado2 == "Mensual") echo "selected"; ?>>Mensual</option>
            <option value="Anual" <?php if($tipoSeleccionado2 == "Anual") echo "selected"; ?>>Anual</option>
        </select>

        <label for="modalidad">Modalidad:</label>
        <select id="modalidad" name="opciones_modalidad">
            <option value="" disabled selected hidden>Selecciona una modalidad</option>
            <option value="CEA" <?php if($tipoSeleccionado == "CEA") echo "selected"; ?>>CEA</option>
            <option value="CEM" <?php if($tipoSeleccionado == "CEM") echo "selected"; ?>>CEM</option>
            <option value="CAE" <?php if($tipoSeleccionado == "CAE") echo "selected"; ?>>CAE</option>
        </select>

        <button type="submit">Filtrar</button>
        <a href="../VistaMain.php" class="btn-reset">Borrar Filtros</a>
    </form>

    <div>
        <form action="Metodos/Buscar_ins.php" method="GET">
            <label for="buscar_input">Buscar:</label>
            <input type="text" id="buscar_input" name="buscar_input" placeholder="Nombre, CURP, etc.">
            <button type="submit">Buscar</button>
        </form>
        <a href="../form_desc.php">
            <button type="button">Descargar</button>
        </a>
    </div>
    <div>
     <a href="expertar_excel.php?
     opciones_modalidad=<?php echo urlencode($tipoSeleccionado); ?>&
     opciones_periodo=<?php echo urlencode($tipoSeleccionado2); ?>&
     buscar_input=<?php echo isset($_GET['buscar_input']) ? urlencode($_GET['buscar_input']) : ''; ?>
     ">
    <button type="button">Descargar Excel</button>
</a>

</div>

    <div>
        <button>
            <a href="PDF/InscripcionesPDF.php" target="_blank">Imprimir PDF</a>
        </button>
    </div>

    <div>
        <h2>Usuarios Inscritos</h2>
        <table class="tabla-inscripciones">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CURP</th>
                    <th>Nombre (Completo)</th>
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
                    $stmt = $conexion->prepare("SELECT * FROM inscripciones WHERE Modalidad = ? AND Periodo = ?");
                    $stmt->bind_param("ss", $tipoSeleccionado, $tipoSeleccionado2);
                    $stmt->execute();
                    $resultado = $stmt->get_result();
                } elseif ($tipoSeleccionado) {
                    $stmt = $conexion->prepare("SELECT * FROM inscripciones WHERE Modalidad = ?");
                    $stmt->bind_param("s", $tipoSeleccionado);
                    $stmt->execute();
                    $resultado = $stmt->get_result();
                } elseif ($tipoSeleccionado2) {
                    $stmt = $conexion->prepare("SELECT * FROM inscripciones WHERE Periodo = ?");
                    $stmt->bind_param("s", $tipoSeleccionado2);
                    $stmt->execute();
                    $resultado = $stmt->get_result();
                } else {
                    $resultado = $conexion->query("SELECT * FROM inscripciones");
                }
                while ($row = $resultado->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['CURP']); ?></td>
                        <td><?php echo htmlspecialchars($row['Nombre']); ?></td>
                        <td><?php echo htmlspecialchars($row['Correo']); ?></td>
                        <td><?php echo htmlspecialchars($row['Telefono']); ?></td>
                        <td><?php echo htmlspecialchars($row['Periodo']); ?></td>
                        <td><?php echo htmlspecialchars($row['Modalidad']); ?></td>
                        <td><?php echo htmlspecialchars($row['Forma_de_Pago']); ?></td>
                        <td><?php echo htmlspecialchars($row['Documentos']); ?></td>
                        <td>
                            <?php if ($row['Estatus'] == 0) { ?>
                                <form method="GET" action="Metodos/Validacion.php">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                    <button type="submit">Validar</button>
                                </form>
                            <?php } else { ?>
                                <span style="color: green; font-size: 24px;">✓</span>
                            <?php } ?>
                        </td>
                        <td>
                            <form action="../Notificacion_inscripciones.php" method="post" 
                                  onsubmit="return confirm('¿Enviar notificación a <?php echo htmlspecialchars($row['Nombre']); ?>?')">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                <button type="submit">Notificar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
