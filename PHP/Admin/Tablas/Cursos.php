<?php 
$conexion = new mysqli("localhost", "root", "", "main");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$tipoSeleccionado = $_GET['opciones_modalidad'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Cursos</title>
    <link rel="stylesheet" href="../../CSS/Cursos.css">
</head>
<body>

<button onclick="window.parent.cerrarContenedor('contenedor')" aria-label="Cerrar ventana">
  Cerrar 
</button>

<div>
    <section>
        <form method="GET" action="">
            <label for="modalidad">Modalidad:</label>
            <select id="modalidad" name="opciones_modalidad" onchange="this.form.submit()">
                <option value="" disabled selected hidden>Selecciona modalidad</option>
                <option value="CEA" <?php if($tipoSeleccionado == "CEA") echo "selected"; ?>>CEA</option>
                <option value="CEM" <?php if($tipoSeleccionado == "CEM") echo "selected"; ?>>CEM</option>
                <option value="CAE" <?php if($tipoSeleccionado == "CAE") echo "selected"; ?>>CAE</option>
            </select>
        </form>
    </section>
</div> 

<div>
    <a href="../form_curs.php" class="btn">Agregar cursos</a>
    <a href="../form_edit_c.php" class="btn">Editar cursos</a>
</div>

<div>
    <form action="Metodos/Buscar_Curso.php" method="GET">
        <label for="buscar_input">Buscar curso:</label>
        <input type="text" id="buscar_input" name="buscar_input" placeholder="Buscar por nombre o ID">
        <button type="submit">Buscar</button>
    </form>
</div>

<div>
    <h2>Cursos Registrados</h2>

    <div>
        <button>
            <a href="../PDF/CursosPDF.php" target="_blank">Imprimir PDF</a>
        </button>
    </div>

    <div>
        <h2>Listado de cursos</h2>

        <table class="tabla-cursos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Información</th>
                    <th>Modalidad</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($tipoSeleccionado) {
                    $stmt = $conexion->prepare("SELECT * FROM cursos WHERE Modalidad = ?");
                    $stmt->bind_param("s", $tipoSeleccionado);
                    $stmt->execute();
                    $resultado = $stmt->get_result();
                } else {
                    $resultado = $conexion->query("SELECT * FROM cursos");
                }

                while ($row = $resultado->fetch_assoc()) {
                ?>   
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['Nombre']); ?></td>
                    <td><?php echo htmlspecialchars($row['Informacion']); ?></td>
                    <td><?php echo htmlspecialchars($row['Modalidad']); ?></td>
                    <td><?php echo htmlspecialchars($row['fecha_creacion']); ?></td>
                    <td>
                        <a href="../form_edit_c.php?id=<?php echo htmlspecialchars($row['id']); ?>">Ver Información</a>
                        <a href="../form_edit_c.php?id=<?php echo htmlspecialchars($row['id']); ?>">Modificar</a> 
                        <a href="Metodos/Eliminar.php?id=<?php echo htmlspecialchars($row['id']); ?>" 
                           onclick="return confirm('¿Eliminar este registro?');">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

