<?php
    $conn= new mysqli ("localhost","root","","main");

    $AQLJ = "SELECT COUNT(*) AS total_usuarios FROM users";
    $result = $conn->query($AQLJ);

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Número total de usuarios: " . $row['total_usuarios'];
    } else {
    echo "No se encontraron usuarios.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/StyleMethod.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div>
<!--
   La parte de html es importante ya que selecciona la opcion y segun lo que se seleccione en la clase de"save.php" imprime un mensaje 
-->
        <br>
        <form action="def.php" method="POST">
        <label for="#">Seleccione el grupo</label>
        <select id="opciones" name="opciones">
             <option value="Asistente ejecutivo">Asistente ejecutivo</option>
             <option value="Carpinteria">Carpinteria</option>
             <option value="Creacion y confeccion de prendas">Creacion y confeccion de prendas</option>
             <option value="Electricidad">Electricidad</option>
             <option value="Estilismo y diseño de imagen">Estilismo y diseño de imagen</option>
             <option value="Fotografia">Fotografia</option>
             <option value="Gastronomia">Gastronomia</option>
             <option value="Hojalateria y pintura">Hojalateria y pintura</option>
             <option value ="Ingles">Ingles</option>
             <option value="Mecanica automotriz">Mecanica automotriz</option>
        </select>
        <input type="submit" value="enviar" id="enviar" name="enviar">
<!--
        <button onclick="condicion()">lo de el condicional</button>
-->

        </form>
    </div>

    <table border="1">
        <thead>
            <th>ID</th>
            <th>NOMBRE</th>
            <TH>CORREO</TH>
            <th>ESTATUS</th>
        </thead>
        
        <tbody>
        <?php
        //codigo que pone infomacion en la tabla desde la base de datos
        $query ="SELECT * FROM users";
        $resultado = $conn->query($query);
        while($row=$resultado->fetch_assoc()){
        ?>   
            <td><?php echo $row['ID'];  ?></td>
            <td><?php echo $row['Nombre'];  ?></td>
            <td><?php echo $row['Correo'];  ?></td>
            <td><?php echo $row['Estado'];  ?></td>
        </tbody>
         <?php } ?>
        
    </table>
</body>
</html>
