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
             <label>Correo</label>
             <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo" >
             <br>
             <label>Contraseña</label>
             <input class="controls" type="password" name="cont" id="cont" placeholder="Ingrese una Contraseña" >
             <br>
             <label style="color:white; background-color: #000000ff;   width: 30%;   height: 30px;">Seleccione el rol del usuario</label>
             <input type="radio" name="rol" value="Administrador"> Administrador
             <input type="radio" name="rol" value="Usuario" checked> Usuario

             <br>
              <input class="button" name="Registrar" type="submit" value="Registrar">
            </form>
              <a href="VistaMain.php"><button >Regresar</button></a>
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
        $Correo= $_POST['correo'];
        $rol=$_POST['rol'];
       
        $insertar="INSERT INTO usuarios_admin (Nombre,Apellidos,Correo,Contraseña,Tipo) VALUES ('$nombre', '$apellido','$Correo', '$contraseña' , '$rol') ";
        $sql=mysqli_query($conexion, $insertar);
        if(!$sql) {
            die("Error al insertar usuario: " . mysqli_error($conexion));
        }
    }
        ?>
    </body>
</html>