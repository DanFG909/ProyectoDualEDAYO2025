<?php 
    $conexioon = new mysqli("localhost","root","","main")
    //Cambiar el nombre de la base de datos pls
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
                <option value="periodo_1">Periodo 1</option>
                <option value="periodo_2">Periodo 1</option>
                <option value="periodo_3" selected>Periodo 3</option>
                <option value="periodo_4" disabled>Periodo 4</option>
            </select>
        </section>

        <section>
           <select name="opciones_modalidad">
                <option value="modalidad_1">Modalidad 1</option>
                <option value="modalidad_2">Modalidad 2</option>
                <option value="modalidad_3" selected>Modalidad 3</option>
                <option value="modalidad_4" disabled>Modalidad 4</option>
            </select>
        </section>
    </div>

    <div>
        <button name="buscar">
            // Imagen referencial a busqueda
        </button>
        <input type="text" name="buscar_input">
    </div>

    <div>
        <h2>Usuarios Inscritos</h2>

        <table border="1">

            <thead>
                <th>ID</th>
                <th>CURP</th>
                <th>Nombre /n (Completo)</th>
                <TH>Correo</TH>
                <th>Telefono</th>
                <th>Forma de pago</th>
                <th>Documentos</th>
                <th>    </th>
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