<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="../../../CSS/Style_user.css" rel="stylesheet">
        <title>Actualizar usuario</title>
        <?php
        $id =$_GET['id'];
        $sql="SELECT * FROM usuarios_admin WHERE id=$id";
        $resultado=$conexion->query($sql);
        $usuario=$resultado->fetch_Assoc();
    ?>
    </head>
    <body>
        <section>
            <form method="post" action="" >
             <label>ID del usuario:</label>
             <input type="number" name="id" required>
             <br>
             <label>Nombre(s)</label>
             <input class="controls" type="text" name="nomb" id="nomb" placeholder="Ingrese su nombre completo" >
             <br>
             <label>Apeliido(s)</label>
             <input class="controls" type="text" name="apell" id="apell" placeholder="Ingrese sus apellidos por favor" >
             <br>
             <label>Correo</label>
             <input class="controls" type="text" name="correo" id="correo" placeholder="Ingrese el correo por favor">
             <br>
             <label>Contraseña</label>
             <input class="controls" type="password" name="cont" id="cont" placeholder="Ingrese una Contraseña" >
             <br>
             <label style="color:white; background-color: #000000ff;   width: 30%;   height: 30px;">Seleccione el rol del usuario</label>
             <input type="checkbox" id="Administrador" name="Administrador">Administrador
             <br>
              <input class="button" name="Actualizar" type="submit" value="Actualizar">
            </form>
              <a href="../Tablas/Usuarios.php"><button >Regresar</button></a>
        </section>
        <?php 
        include("conexion.php");
        session_start();
        if (isset($_POST['Actualizar'])){
            $tiempo_espera = 30;
            if(isset($_SESSION['ultimo_registro'])){
                $segundos_transcurridos = time() - $_SESSION['ultimo_registro'];
                if($segundos_transcurridos < $tiempo_espera){
                $espera_restante = $tiempo_espera - $segundos_transcurridos;
                echo "<script>alert('Por favor espera $espera_restante segundos antes de volver a intentar de nuevo.');</script>";
                exit;
            }
        }
        $_SESSION['ultimo_registro'] = time();
        if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
} else {
    die("ID no proporcionado.");
}

        $nombre= $_POST['nomb'];
        $apellido= $_POST['apell'];
        $correo= $_POST['correo'];
        $contraseña= $_POST['cont'];
        $rol = isset($_POST['Administrador']) ? "Administrador" : "Usuario";

       $stmt = $conexion->prepare("UPDATE usuarios_admin SET Nombre = ?, Apellidos = ?, Correo = ?, Contraseña = ?, Tipo = ? WHERE id = ?");
if (!$stmt) {
    die("Error en prepare: " . $conexion->error);
}

$stmt->bind_param("sssssi", $nombre, $apellido, $correo, $contraseña, $rol, $id);
$stmt->execute();

    }
        ?>
    </body>
</html>