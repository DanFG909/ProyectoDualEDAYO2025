<?php
session_start();
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro a cursos</title>
    <link rel="shortcut icon" href="../Images/logo.jpg" type="image/jpeg">
    <link href="../../../CSS/Style3.css" rel="stylesheet">
    <script src="../../../JS/desc.js"></script>
    <script src="../../../JS/Mostrar_Panel.js"></script>
    <script>
        function mostraPanel(id, select) {
            const panel = document.getElementById(id);
            panel.style.display = (select.value === "Transferencia") ? "block" : "none";
        }
    </script>
    <style>
        .info-curso {
            border: 1px solid #d4b00e;
            padding: 15px;
            margin-top: 10px;
            border-radius: 8px;
            background-color: #7F0D31;
        }
        h3 {
            color: #d4b00e;
        }
    </style>
</head>
<body>
<section>
<form method="POST" action="" enctype="multipart/form-data">

    <label>CURP:</label>
    <input class="controls" type="text" name="curp" id="curp" placeholder="Ingrese su CURP" required>
    <br>

    <label>Nombre completo:</label>
    <input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre completo" required>
    <br>

    <label>Correo electrónico:</label>
    <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su correo electrónico" required>
    <br>

    <label>Teléfono:</label>
    <input class="controls" type="tel" name="telefono" id="telefono" placeholder="Ingrese su número telefónico" required>
    <br>

    <label>Periodo:</label>
    <select name="periodo" id="periodo" required>
        <option value="">Seleccione un periodo</option>
        <option value="Enero-Abril ">Enero - Abril </option>
        <option value="Mayo-Agosto ">Mayo - Agosto </option>
        <option value="Septiembre-Diciembre ">Septiembre - Diciembre </option>
    </select>
    <br>

    <label>Modalidad:</label>
    <select name="modalidad" id="modalidad" required>
        <option value="">Seleccione la modalidad</option>
        <option value="Presencial">Presencial</option>
        <option value="En línea">En línea</option>
        <option value="Mixta">Mixta</option>
    </select>
    <br>

    <label>Seleccione su municipio de procedencia:</label>
    <select name="municipio" required>
         <option value="Almoloya de Juarez">Almoloya de Juarez</option>
         <option value="Zinacantepec">Zinacantepec</option>
         <option value="Temoaya">Temoaya</option>
         <option value="San Mateo Atenco">San Mateo Atenco</option>
         <option value="Tecaxic">Tecaxic</option>
         <option value="Metepec">Metepec</option>
         <option value="Otzolotepec">Otzolotepec</option>
         <option value="Calimaya">Calimaya</option>
         <option value="Chapultepec">Chapultepec</option>
         <option value="Tenango del Valle">Tenango del Valle</option>
     </select>
     <br>

    <label>Seleccione un Curso:</label>
    <select name="curso" id="curso" onchange="mostrarEspecificaciones()" required>
         <option value="">Selecciona un curso</option>
         <option value="Asistente ejecutivo">Asistente ejecutivo</option>
         <option value="Carpintería">Carpintería</option>
         <option value="Creación y confección de prendas">Creación y confección de prendas</option>
         <option value="Electricidad">Electricidad</option>
         <option value="Estilismo y diseño de imagen">Estilismo y diseño de imagen</option>
         <option value="Fotografía">Fotografía</option>
         <option value="Gastronomía">Gastronomía</option>
         <option value="Hojalatería y pintura">Hojalatería y pintura</option>
         <option value="Inglés">Inglés</option>
         <option value="Mecánica automotriz">Mecánica automotriz</option>
    </select>
    
    <div id="especificaciones"></div>
    
    <label>Forma de Pago:</label>
    <select name="forma_pago" id="forma_pago" onchange="mostraPanel('panel1', this)" required>
        <option value="">Seleccione una forma de pago</option>
        <option value="Efectivo">Efectivo</option>
        <option value="Transferencia" onchange="mostraPanel('panel1', this)">Transferencia</option>
    </select>
    <br>

    <div id="panel1" class="Panel" style="display:none;">
        <b>Subir documentos (solo si es por transferencia):</b><br><br>
        <label>Identificación oficial (INE):</label>
        <input type="file" name="Ine" accept="application/pdf"><br>
        <label>Comprobante de pago:</label>
        <input type="file" name="Comprobante" accept="application/pdf"><br>
    </div>

    <br>
    <input class="button" name="Registrar" type="submit" value="Registrar">
</form>
</section>

<?php
include("conexion.php");

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

    // Datos del formulario
    $curp = $_POST['curp'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $periodo = $_POST['periodo'];
    $modalidad = $_POST['modalidad'];
    $municipio = $_POST['municipio'];
    $curso = $_POST['curso'];
    $forma_pago = $_POST['forma_pago'];
    $estado = 0;

    // Condición automática para Documentos según forma de pago
    if ($forma_pago == "Transferencia") {
        $documentos = "Documentación enviada en línea";
    } else {
        $documentos = "Se entregarán en oficina";
    }

    // Verificar duplicados
    $verificar = "SELECT * FROM inscripciones WHERE CURP='$curp' OR Correo='$correo'";
    $resultado = mysqli_query($conexion, $verificar);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('Este CURP o correo ya está registrado.');</script>";
        exit;
    }

    // Insertar en la base de datos
    $insertar = "INSERT INTO inscripciones (CURP, Nombre, Correo, Telefono, Periodo, Modalidad, Forma_de_Pago, Documentos)
                 VALUES ('$curp', '$nombre', '$correo', '$telefono', '$periodo', '$modalidad', '$forma_pago', '$documentos')";
    $sql = mysqli_query($conexion, $insertar);
    if (!$sql) {
        die('Error al insertar usuario: ' . mysqli_error($conexion));
    }

    $user_id = mysqli_insert_id($conexion);

    // Subida de archivos si aplica
    if ($forma_pago == "Transferencia") {
        if (!empty($_FILES['Ine']['tmp_name'])) {
            $nombre_ine = $_FILES['Ine']['name'];
            $tipo_ine = $_FILES['Ine']['type'];
            $contenido_ine = file_get_contents($_FILES['Ine']['tmp_name']);

            $stmt = $conexion->prepare("INSERT INTO archivos (user_id, tipo, nombre_original, tipo_mime, contenido) VALUES (?, 'INE', ?, ?, ?)");
            $null = NULL;
            $stmt->bind_param("issb", $user_id, $nombre_ine, $tipo_ine, $null);
            $stmt->send_long_data(3, $contenido_ine);
            $stmt->execute();
            $stmt->close();
        }

        if (!empty($_FILES['Comprobante']['tmp_name'])) {
            $nombre_comp = $_FILES['Comprobante']['name'];
            $tipo_comp = $_FILES['Comprobante']['type'];
            $contenido_comp = file_get_contents($_FILES['Comprobante']['tmp_name']);

            $stmt = $conexion->prepare("INSERT INTO archivos (user_id, tipo, nombre_original, tipo_mime, contenido) VALUES (?, 'Comprobante', ?, ?, ?)");
            $null = NULL;
            $stmt->bind_param("issb", $user_id, $nombre_comp, $tipo_comp, $null);
            $stmt->send_long_data(3, $contenido_comp);
            $stmt->execute();
            $stmt->close();
        }
    }

    echo "<script>alert('Registrado exitosamente.'); window.location.href='".$_SERVER['PHP_SELF']."';</script>";
}
?>
</body>
</html>
