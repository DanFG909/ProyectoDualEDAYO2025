<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Images/logo.jpg" type="image/jpeg">
    <link href="../CSS/Style3.css" rel="stylesheet">
    <script src="../JS/desc.js"></script>
    <script src="../JS/Mostrar_panel.js"></script>
    
    <title>Registro de usuario</title>
</head>
<body>
    <section>
    <form method="POST" action="" enctype="multipart/form-data">
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

<div id="pagos" ></div>

    <label>
        <input   type="checkbox" id="presencial" value="Presencial">Presencial
        <input  type="checkbox" id="check1" value="Transferencia" onchange="mostraPanel('panel1', this)">Tranferencia
</label>
    <div id="panel1" class="Panel">

    <b>Subir archivos si es por transferencia</b>
        <label>Ine </label>
        <input type="file" name="Ine" accept="application/pdf">
        <label>Comprobante</label>
        <input type="file" name="archivo_pComprobante" accept="application/pdf">

     </div>

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

    // Obtener datos del formulario
    $nombre = $_POST['nomb'];
    $municipio = $_POST['municipio'];
    $actividad = $_POST['Actividad'];
    $telefono = $_POST['Telefono'];
    $correo = $_POST['Correo'];
    $notificacion = $_POST['not'];
    $estado = 0;

    // Verificar duplicado
    $verificar = "SELECT * FROM users WHERE Correo = '$correo' AND Telefono='$telefono' AND Nombre='$nombre'";
    $resultado = mysqli_query($conexion, $verificar);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('Este correo, teléfono o nombre ya está registrado.');</script>";
        exit;
    }

    // Preparar nombres de archivo (si existen)
    $ruta_ine = null;
    $ruta_comprobante = null;

    // Guardar archivo INE
    if (isset($_FILES['Ine']) && $_FILES['Ine']['error'] === 0) {
        if (mime_content_type($_FILES['Ine']['tmp_name']) === 'application/pdf') {
            $nombre_ine = uniqid() . '_ine.pdf';
            $ruta_ine = __DIR__ . '/../uploads/' . $nombre_ine; 
            move_uploaded_file($_FILES['Ine']['tmp_name'], $ruta_ine);
        } else {
            echo "<script>alert('El archivo INE no es un PDF válido.');</script>";
            exit;
        }
    }

    // Guardar archivo Comprobante
    if (isset($_FILES['archivo_pComprobante']) && $_FILES['archivo_pComprobante']['error'] === 0) {
        if (mime_content_type($_FILES['archivo_pComprobante']['tmp_name']) === 'application/pdf') {
            $nombre_comprobante = uniqid() . '_comprobante.pdf';
            $ruta_comprobante = __DIR__ . '/../uploads/' . $nombre_comprobante;
            move_uploaded_file($_FILES['archivo_pComprobante']['tmp_name'], $ruta_comprobante);
        } else {
            echo "<script>alert('El archivo Comprobante no es un PDF válido.');</script>";
            exit;
        }
    }

    
    $insertar = "INSERT INTO users 
        (Nombre, Correo, Municipio, Telefono, Taller, Estado, Notificacion, ine_pdf, comprobante_pdf) 
        VALUES 
        ('$nombre', '$correo', '$municipio', '$telefono', '$actividad', '$estado', '$notificacion', '$ruta_ine', '$ruta_comprobante')";

    $sql = mysqli_query($conexion, $insertar);
    if (!$sql) {
    die("Error al insertar: " . mysqli_error($conexion));
}


    if ($sql) {
        echo "<script>alert('Registrado exitosamente.');</script>";
    } else {
        echo "<script>alert('Error al registrar. Verifica que los datos no estén duplicados.');</script>";
    }
}
?>
