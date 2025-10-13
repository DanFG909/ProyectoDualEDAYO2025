<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
    <link href="../../CSS/Style_user.css" rel="stylesheet">

        <title>Agregar usuario</title>
        

    </head>
    <body>
        <section>
            <form method="post" action="" >
             <label>Nombre(s)</label>
             <input class="controls" type="text" name="nomb" id="nomb" placeholder="Ingrese su nombre completo" >
             <br>
             <label>Apeliido(s)</label>
             <input class="controls" type="text" name="apell" id="apell" placeholder="Ingrese sus apellidos por favor" >
             <br>
             <label>Contraseña</label>
             <input class="controls" type="password" name="cont" id="cont" placeholder="Ingrese una Contraseña" >
             <br>
             <label style="color:white; background-color: #000000ff;   width: 30%;   height: 30px;">Seleccione el rol del usuario</label>
             <input type="checkbox" id="Administrador" name="Administrador">Administrador
             <br>
              <input class="button" name="Registrar" type="submit" value="Registrar">
            </form>
              <a href="Usuarios.php"><button >Regresar</button></a>
        </section>
        <?php 
        include("conexion.php");
        session_start();
        if (isset($_POST['Registrar'])){
            $tiempo_espera = 30;
            if(isset($_SESSION['ultimo_registro'])){
                $segundos_transcurridos = time() - $_SESSION['ultimo_registro'];
                if($segundos_transcurridos < $tiempo_espera){
                $espera_restante = $tiempo_espera - $segundos_transcurridos;
                echo "<srcipt>alert('Por favor espera $espera_restante segundos antes de volver a intentar de nuevo.');</script>";
                exit;
            }
        }
        $_SESSION['ultimo_registro'] = time();
        $nombre= $_POST['nomb'];
        $apellido= $_POST['apell'];
        $contraseña= $_POST['cont'];
        $rol=$_POST['Administrador'];

        $insertar="INSERT INTO usuarios_admin (Nombre,Apellidos,Correo,Rol) VALUES ('$nombre', '$apellido', '$contraseña' , '$rol') ";
        $sql=mysqli_query($conexion, $insertar);
        if(!$sql) {
            die("Error al insertar usuario: " . mysqli_error($conexion));
        }
    }
        ?>
    </body>
</html>