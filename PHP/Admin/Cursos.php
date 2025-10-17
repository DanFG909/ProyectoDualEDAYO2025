<?php 
$conexioon = new mysqli("localhost", "root", "", "main");
$tipoSeleccionado = $_GET['opciones_modalidad'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Cursos</title>
</head>
<body>

<button onclick="window.parent.cerrarContenedor('contenedor4')">
  Cerrar 
</button>

<div>
        <section>
            <form method="GET" action="">
                <select name="opciones_modalidad" onchange="this.form.submit()">
                    <option value="" disabled selected hidden>Modalidad</option>
                    <option value="CEA" <?php if($tipoSeleccionado == "CEA") echo "selected"; ?>>CEA</option>
                    <option value="CEM" <?php if($tipoSeleccionado == "CEM") echo "selected"; ?>>CEM</option>
                    <option value="CAE" <?php if($tipoSeleccionado == "CAE") echo "selected"; ?>>CAE</option>
                </select>
            </form>
        </section>
</div> 
 <a href="form_curs.php"><button>Agregar cursos</button></a>
 <a href="form_edit_c.php"><button>Editar cursos</button></a>

<div>
    <form action="Buscar_Curso.php" method="GET">
        <input type="text" name="buscar_input" placeholder="Buscar por nombre y ID.">
        <button type="submit">Buscar</button>
    </form>
</div>

<div>
    <h2>Cursos Registrados</h2>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Informacion</th>
                <th>Modalidad</th>
                <th>Fecha de creacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($tipoSeleccionado) {
                $stmt = $conexioon->prepare("SELECT * FROM cursos WHERE Modalidad = ?");
                $stmt->bind_param("s", $tipoSeleccionado);
                $stmt->execute();
                $resultado = $stmt->get_result();
            } else {
                $resultado = $conexioon->query("SELECT * FROM cursos");
            }

            while ($row = $resultado->fetch_assoc()) {
        ?>   
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['Nombre']; ?></td>
                <td><?php echo $row['Informacion']; ?></td>
                <td><?php echo $row['Modalidad']; ?></td>
                <td><?php echo $row['fecha_creacion']; ?></td>
                <td>
                    <a href="form_info_c.php?id=<?php echo $row['id']; ?>">Ver Información</a>
                    <a href="form_curs.php?id=<?php echo $row['id']; ?>">Modificar</a> 
                    <a href="Eliminar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Eliminar este registro?');">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
