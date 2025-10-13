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
</head>
<body>
    <div>
         <section>
            <form method="GET" action="">
                <select name="opciones_periodo" onchange="this.form.submit()">
                    <option value="" disabled selected hidden>Periodos</option>
                    <option value="Mensual" <?php if($tipoSeleccionado2 == "Mensual") echo "selected"; ?>>Mensual</option>
                    <option value="Anual" <?php if($tipoSeleccionado2 == "Anual") echo "selected"; ?>>Anual</option>
                </select>
            </form>
        </section>

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

   <div>
    //colocar imagen de buscar porfa
        <form action="Buscar_ins.php" method="GET">
            <input type="text" name="buscar_input" placeholder="Buscar por nombre, CURP, etc.">
            <button type="submit">Buscar</button>
        </form>
        <a href="form_desc.php"><button>Descargar</button></a>
    </div>

    <div>
        <h2>Usuarios Inscritos</h2>

        <table border="1">
            <thead>
                <th>ID</th>
                <th>CURP</th>
                <th>Nombre<br>(Completo)</th>
                <TH>Correo</TH>
                <th>Telefono</th>
                <th>Periodo</th>
                <th>Modalidad</th>
                <th>Forma de pago</th>
                <th>Documentos</th>
                <th>Notificacion</th>
            </thead>
        <tbody>
<!--
            $query ="SELECT * FROM inscripciones";
            $resultado = $conexioon->query($query);
            while($row=$resultado->fetch_assoc()){        
-->
        <?php
             if ($tipoSeleccionado) {
                $stmt = $conexioon->prepare("SELECT * FROM inscripciones WHERE Modalidad = ?");
                $stmt->bind_param("s", $tipoSeleccionado);
                $stmt->execute();
                $resultado = $stmt->get_result();
            } else if($tipoSeleccionado2){
                $stmt2 = $conexioon->prepare("SELECT * FROM inscripciones WHERE Periodo = ?");
                $stmt2->bind_param("s", $tipoSeleccionado2);
                $stmt2->execute();
                $resultado = $stmt2->get_result();
            } else{
                $resultado = $conexioon->query("SELECT * FROM inscripciones");
            }

            while ($row = $resultado->fetch_assoc()) {
        ?>   
                <tr>
                    <td><?php echo $row['id'];  ?></td>
                    <td><?php echo $row['CURP'];  ?></td>
                    <td><?php echo $row['Nombre'];  ?></td>
                    <td><?php echo $row['Correo'];  ?></td>
                    <td><?php echo $row['Telefono'];  ?></td>
                    <td><?php echo $row['Periodo'];  ?></td>
                    <td><?php echo $row['Modalidad'];  ?></td>
                    <td><?php echo $row['Forma_de_Pago'];  ?></td>
                    <td><?php echo $row['Documentos'];  ?></td>
                    <td>
                        <a href="Validacion.php">Validacion</a>
                        <a href="Notificacion.php">Notificacion</a>
                    </td>
                </tr>
        <?php } ?>
            </tbody>
        </table>

    </div>
    
</body>
</html>