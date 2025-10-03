<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Images/logo.jpg" type="image/jpeg">
    <link href="../CSS/Style3.css" rel="stylesheet">
    <script src="../JS/desc.js"></script>
    <title>Registro de usuario</title>
</head>
<body>
    <section>
    <form method="POST" action="">
        <label>Nombre completo:</label>
        <input class="controls" type="text" name="nomb" id="nomb" placeholder="ingrese su nombre completo" required>
        <br>
        <label>Seleccione su municipio de procedensia:</label>
        <select name="municipio">
             <option value="Almoloya de Juarez">Almoloya de Juarez</option>
             <option value="Zinacantepec">Zinacantepec</option>
             <option value="Temoaya">Temoaya</option>
             <option value="San Mateo Atenco">San Mateo Atenco</option>
             <option value="Tecaxic">Tecaxic</option>
             <option value="Metepec">Metepec</option>
             <option value="Otzolotepec">Otzolotepec</option>
             <option value="Calimaya">Calimaya</option>
             <option value ="chapultepec">Chapultepec</option>
             <option value="Tenango">Tenango del valle</option>
         </select>
         <br>
         <label>Sexo:</label>
         <input type="radio" id="Maculino" name="sexo" value="Masculino" required>Masculino
         <input type="radio" id="Femenino" name="sexo" value="Femenino">Femenino
         <br>
         <label>Capacidad:</label>
         <input type="radio" id="si" name="capacidad" value="si" required>si
         <input type="radio" id="no" name="capacidad" value="no">no
         <br>
          <label>Ingrese su Telefono:</label>
         <input class="controls" type="text"name="Telefono" id="Telefono" placeholder="Ingrese su Telefono " required>
         <br>
          <label>Ingrese su Correo:</label>
         <input class="controls" type="text"name="Correo" id="Corre" placeholder="Ingrese su Correo Electronico " required>
         <br>
          <label>Seleccione un Curso :</label>
          <select name="Actividad" id="curso" onchange="mostrarEspecificaciones()">
             <option value=""> Selecciona un curso </option>
             <option value="Asistente ejecutivo" >Asistente ejecutivo</option>
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
<br>
<div id="especificaciones"></div>

          <label>Quieres recibir informacion de nosotros:</label>
         <input type="radio" id="si" name="not" value="si">si
         <input type="radio" id="no" name="not" value="no">no
         <br>
         <br>
         <input class="button" name="Registrar" type="submit" value="Registrar">
    </form>

</section>
</body>
</html>

<?php
include("conexion.php");
session_start();

if (isset($_POST['Registrar'])) {
    $tiempo_espera = 30;

    if (isset($_SESSION['ultimo_registro'])) {
        $segundos_transcurridos = time() - $_SESSION['ultimo_registro'];
        if ($segundos_transcurridos < $tiempo_espera) {
            $espera_restante = $tiempo_espera - $segundos_transcurridos;
            echo "<script>alert('Por favor espera $espera_restante segundos antes de intentar registrarte de nuevo.');</script>";
            exit;
        }
    }
    $_SESSION['ultimo_registro'] = time();
    $nombre = $_POST['nomb'];
    $municipio = $_POST['municipio'];   
    $sexo = $_POST['sexo'];
    $Actividad = $_POST['Actividad'];
    $capacidad = $_POST['capacidad'];
    $telefono = $_POST['Telefono'];
    $correo = $_POST['Correo'];
    $notificacion = $_POST['not'];
    $verificar = "SELECT * FROM users WHERE Correo = '$correo' AND Telefono='$telefono ' AND Nombre='$nombre'" ;
    $resultado = mysqli_query($conexion, $verificar);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('Este correo, Telefono o nombre ya está registrado. Solo puedes registrarte una vez.');</script>";
        exit;
    }
    $estado=0;
    $insertar = "INSERT INTO users (Nombre, Correo, Municipio, Sexo, Capacidad ,Telefono, Taller, Estado) 
                 VALUES ('$nombre', '$correo', '$municipio', '$sexo', '$capacidad', '$telefono', '$Actividad', '$estado')";

    $sql = mysqli_query($conexion, $insertar);
    if ($sql) {
        echo "<script>alert('Registrado exitosamente.');</script>";
    } else {
        echo "<script>alert('Hubo un error al registrar esto puede deverse a que su nombre,correo electronico o numero telefonico ya se a registrado con anteriodidad.');</script>";
    }
} 
?>

