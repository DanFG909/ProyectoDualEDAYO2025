<?php 
    $conexioon = new mysqli("localhost","root","","main")

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
           <select name="opciones_periodo">  
                <option value="periodos" disabled>Periodos</option>
                <option value="periodo_mensual"selected>Mensual</option>
                <option value="periodo_anual" selected>Anual</option>
<!--
acomodar bien el select                
-->
            </select>
        </section>

        <section>
           <select name="opciones_modalidad">
                <option value="modalidad_cea">CEA</option>
                <option value="modalidad_cem">CEM</option>
                <option value="modalidad_cae">CAE</option>
                <option value="modalidad_escolarisado" selected>Escolarisado</option>
            </select>
        </section>
    </div>

    <div>
        <button></button>
      
    </div>

   <div>
    //colocar imagen de buscar porfa
    <form action="Buscar.php" method="GET">
        <input type="text" name="buscar_input" placeholder="Buscar por nombre, CURP, etc.">
        <button type="submit">Buscar</button>
    </form>
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
                <th>Forma de pago</th>
                <th>Documentos</th>
                <th>    </th>
                <th>Notificacion</th>
            </thead>
        
        <tbody>
        <?php
            $query ="SELECT * FROM inscripciones";
            $resultado = $conexioon->query($query);
            while($row=$resultado->fetch_assoc()){
        ?>   
                <tr>
                    <td><?php echo $row['id'];  ?></td>
                    <td><?php echo $row['CURP'];  ?></td>
                    <td><?php echo $row['Nombre'];  ?></td>
                    <td><?php echo $row['Correo'];  ?></td>
                    <td><?php echo $row['Telefono'];  ?></td>
                    <td><?php echo $row['Forma_de_Pago'];  ?></td>
                    <td><?php echo $row['Documentos'];  ?></td>
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