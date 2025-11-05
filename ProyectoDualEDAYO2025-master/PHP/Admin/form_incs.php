<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro a cursos</title>
    <link rel="shortcut icon" href="../Images/logo.jpg" type="image/jpeg">
    <link href="../../CSS/Style3.css" rel="stylesheet">
        <script src="../../JS/desc.js"></script>
            <script src="../../JS/Mostrar_Panel.js"></script>

    
</head>
<body>
<section>
<form method="POST" action="" enctype="multipart/form-data">

    <label>Nombre completo:</label>
    <input class="controls" type="text" name="nomb" id="nomb" placeholder="ingrese su nombre completo" required>
    <br>

    <label>Seleccione su municipio de procedensia:</label>
    <select name="municipio" required>
         <option value="Almoloya de Juarez">Almoloya de Juarez</option>
         <option value="Zinacantepec">Zinacantepec</option>
         <option value="Temoaya">Temoaya</option>
         <option value="San Mateo Atenco">San Mateo Atenco</option>
         <option value="Tecaxic">Tecaxic</option>
         <option value="Metepec">Metepec</option>
         <option value="Otzolotepec">Otzolotepec</option>
         <option value="Calimaya">Calimaya</option>
         <option value="chapultepec">Chapultepec</option>
         <option value="Tenango">Tenango del valle</option>
     </select>
     <br>

      <label>Ingrese su Telefono:</label>
     <input class="controls" type="text"name="Telefono" id="Telefono" placeholder="Ingrese su Telefono " required>
     <br>

      <label>Ingrese su Correo:</label>
     <input class="controls" type="email" name="Correo" id="Correo" placeholder="Ingrese su Correo Electronico " required>
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
         <option value="Ingles">Ingles</option>
         <option value="Mecanica automotriz">Mecanica automotriz</option>
      </select>
      <br>
      <div id="especificaciones" ></div>
    <label>
        <input type="radio" id="presencial" name="presencial" value="Presencial">Presencial
        <input type="checkbox" id="check1" name="transferencia" value="Transferencia" onchange="mostraPanel('panel1', this)">Transferencia
    </label>

    <div id="panel1" class="Panel" style="display:none;">
        <b>Subir archivos si es por transferencia</b><br><br>
        <label>Ine </label>
        <input type="file" name="Ine" accept="application/pdf"><br>
        <label>Comprobante</label>
        <input type="file" name="archivo_pComprobante" accept="application/pdf">
    </div>

    <br>
    <label>Quieres recibir informacion de nosotros:</label>
     <input type="radio" id="si" name="not" value="si">si
     <input type="radio" id="no" name="not" value="no">no
     <br><br>
     <input class="button" name="Registrar" type="submit" value="Registrar">

</form>
</section>

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
    $actividad = $_POST['Actividad'];
    $telefono = $_POST['Telefono'];
    $correo = $_POST['Correo'];
    $notificacion = $_POST['not'];
    $estado = 0;

    // Determinar si hay documentación o no, según método
    if (isset($_POST['transferencia'])) {
    $documentacion = "Documentación enviada en línea";
    } elseif (isset($_POST['presencial'])) {
    $documentacion = "Se entregará en oficina";
    } else {
    $documentacion = "No especificado";
    }
    

    // Verificar duplicados
    $verificar = "SELECT * FROM users WHERE Correo = '$correo' AND Telefono='$telefono' AND Nombre='$nombre'";
    $resultado = mysqli_query($conexion, $verificar);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('Este correo, teléfono o nombre ya está registrado.');</script>";
        exit;
    }

    $insertar = "INSERT INTO users (Nombre, Correo, Municipio, Telefono, Taller, Estado, Notificacion, Documentos
) 
    VALUES ('$nombre', '$correo', '$municipio', '$telefono', '$actividad', '$estado', '$notificacion', '$documentacion')";
    $sql = mysqli_query($conexion, $insertar);
    if (!$sql) {
        die("Error al insertar usuario: " . mysqli_error($conexion));
    }
    $user_id = mysqli_insert_id($conexion);

    if (isset($_POST['transferencia'])) {
        
        if (!empty($_FILES['Ine']['tmp_name'])) {
            $nombre_ine = $_FILES['Ine']['name'];
            $tipo_ine = $_FILES['Ine']['type'];
            $contenido_ine = file_get_contents($_FILES['Ine']['tmp_name']);

            $stmt = $conexion->prepare("INSERT INTO archivos (user_id, tipo, nombre_original, tipo_mime, contenido) VALUES (?, 'ine', ?, ?, ?)");
            $null = NULL;
            $stmt->bind_param("issb", $user_id, $nombre_ine, $tipo_ine, $null);
            $stmt->send_long_data(3, $contenido_ine);
            $stmt->execute();
            $stmt->close();
        }

        if (!empty($_FILES['archivo_pComprobante']['tmp_name'])) {
            $nombre_comprobante = $_FILES['archivo_pComprobante']['name'];
            $tipo_comprobante = $_FILES['archivo_pComprobante']['type'];
            $contenido_comprobante = file_get_contents($_FILES['archivo_pComprobante']['tmp_name']);

            $stmt = $conexion->prepare("INSERT INTO archivos (user_id, tipo, nombre_original, tipo_mime, contenido) VALUES (?, 'comprobante', ?, ?, ?)");
            $null = NULL;
            $stmt->bind_param("issb", $user_id, $nombre_comprobante, $tipo_comprobante, $null);
            $stmt->send_long_data(3, $contenido_comprobante);
            $stmt->execute();
            $stmt->close();
        }
    }

    echo "<script>alert('Registrado exitosamente.'); window.location.href='".$_SERVER['PHP_SELF']."';</script>";
}
?>

</body>
</html>
