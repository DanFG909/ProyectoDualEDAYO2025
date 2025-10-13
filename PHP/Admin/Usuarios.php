<?php 
$conexioon = new mysqli("localhost", "root", "", "main");
// El nombre de la base dejenseloooo

$tipoSeleccionado = $_GET['opciones_usuario'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Usuarios</title>
</head>
<body>

<div>
  <section>
    <form method="GET" action="">
      <select name="opciones_usuario" onchange="this.form.submit()">
        <option value="" disabled selected hidden>Tipo</option>
        <option value="Administrador" <?php if($tipoSeleccionado == "Administrador") echo "selected"; ?>>Administrador</option>
        <option value="Normal" <?php if($tipoSeleccionado == "Normal") echo "selected"; ?>>Normal</option>
      </select>
    </form>
  </section>
</div>

<div>
    <button>aquí va el formulario de Acali para crear nuevos administradores</button>
</div>

<div>
    <form action="Buscar.php" method="GET">
        <input type="text" name="buscar_input" placeholder="Buscar por nombre, Apellidos etc.">
        <button type="submit">Buscar</button>
    </form>
</div>
<div>
    <h2>Usuarios Registrados</h2>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre<br>(Completo)</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Acciones</th>
                <<th>   </th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($tipoSeleccionado) {
                $stmt = $conexioon->prepare("SELECT * FROM usuarios_admin WHERE Tipo = ?");
                $stmt->bind_param("s", $tipoSeleccionado);
                $stmt->execute();
                $resultado = $stmt->get_result();
            } else {
                $resultado = $conexioon->query("SELECT * FROM usuarios_admin");
            }

            while ($row = $resultado->fetch_assoc()) {
        ?>   
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['Nombre']; ?></td>
                <td><?php echo $row['Apellidos']; ?></td>
                <td><?php echo $row['Correo']; ?></td>
                <td><?php echo $row['Tipo']; ?></td>
                <td>
                    <a href="Editar.php?id=<?php echo $row['id']; ?>">Modificar</a> 
                    <a href="Eliminar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Eliminar este registro?');">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
