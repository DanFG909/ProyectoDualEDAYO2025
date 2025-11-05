<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase</title>
    <link href="../CSS/StyleDef.css" rel="stylesheet">

    </head>
<body>
    
</body>
</html>
<?php
    $conn= new mysqli ("localhost","root","","main");
    if ($conn) {
        echo "Conexión exitosa: ";
    }
$a = false;
$b = false;
$c = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opc = $_POST['opciones'];
    echo "Has seleccionado: " . htmlspecialchars($opc);

}

    if($opc == 'Fotografia'){
        $a = true;
       
    $resultado = $conn->query("SELECT * FROM users WHERE estado = '0'");

    $correos = [];
    $listaUsuarios = [];

    while ($usuario = $resultado->fetch_assoc()) {
        $correos[] = $usuario['Correo'];
        $listaUsuarios[] = [
            'nombre' => $usuario['Nombre'],
            'correo' => $usuario['Correo']
        ];
    }

    if (count($correos) > 0) {
        $to = implode(",", $correos);
        $asunto = urlencode("Notificación general importante");
        $cuerpo = urlencode("Hola,\n\nEste es un aviso general para todos los usuarios. Gracias por su atención.");

        echo "<a href='mailto:?bcc=$to&subject=$asunto&body=$cuerpo' onclick='marcarTodosEnviados()'>
                <button id='btnEnviar'>Enviar a todos</button>
              </a>";
    } else {
        echo "<button disabled>No hay usuarios pendientes</button>";
    }

    echo "<hr><h3>Listado de usuarios</h3>";
    $resultadoTodos = $conn->query("SELECT * FROM users WHERE Taller = '$opc'");
    echo "<table border='1' cellpadding='8'><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Estado</th><th>Taller</th> </tr>";
    while ($usuario = $resultadoTodos->fetch_assoc()) {
        echo "<tr>
                <td>{$usuario['ID']}</td>
                <td>{$usuario['Nombre']}</td>
                <td>{$usuario['Correo']}</td>
                <td>{$usuario['Estado']}</td>
                <td>{$usuario['Taller']}</td>

              </tr>";
    }
    echo "</table>";

    $conn->close();
    ?>

    <?php 
    
////////////////////////////////////////////////////////////////////////////////
?>
    </table>
    <?php

    } else if($opc == 'Asistente ejecutivo') {
        $b = true;
     $resultado = $conn->query("SELECT * FROM users WHERE estado = '0'");

    $correos = [];
    $listaUsuarios = [];

    while ($usuario = $resultado->fetch_assoc()) {
        $correos[] = $usuario['Correo'];
        $listaUsuarios[] = [
            'nombre' => $usuario['Nombre'],
            'correo' => $usuario['Correo']
        ];
    }

    if (count($correos) > 0) {
        $to = implode(",", $correos);
        $asunto = urlencode("Notificación general importante");
        $cuerpo = urlencode("Hola,\n\nEste es un aviso general para todos los usuarios. Gracias por su atención.");

        echo "<a href='mailto:?bcc=$to&subject=$asunto&body=$cuerpo' onclick='marcarTodosEnviados()'>
                <button id='btnEnviar'>Enviar a todos</button>
              </a>";
    } else {
        echo "<button disabled>No hay usuarios pendientes</button>";
    }

    echo "<hr><h3>Listado de usuarios</h3>";
    $resultadoTodos = $conn->query("SELECT * FROM users WHERE Taller = '$opc'");
    echo "<table border='1' cellpadding='8'><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Estado</th><th>Grupo</th> </tr>";
    while ($usuario = $resultadoTodos->fetch_assoc()) {
        echo "<tr>
                <td>{$usuario['ID']}</td>
                <td>{$usuario['Nombre']}</td>
                <td>{$usuario['Correo']}</td>
                <td>{$usuario['Estado']}</td>
                <td>{$usuario['Taller']}</td>

              </tr>";
    }
    echo "</table>";

    $conn->close();
    ?>

    <?php 

    } else if($opc == 'Carpinteria') {
        $c = true;
        $resultado = $conn->query("SELECT * FROM users WHERE estado = '0'");

    $correos = [];
    $listaUsuarios = [];

    while ($usuario = $resultado->fetch_assoc()) {
        $correos[] = $usuario['Correo'];
        $listaUsuarios[] = [
            'nombre' => $usuario['Nombre'],
            'correo' => $usuario['Correo']
        ];
    }

    if (count($correos) > 0) {
        $to = implode(",", $correos);
        $asunto = urlencode("Notificación general importante");
        $cuerpo = urlencode("Hola,\n\nEste es un aviso general para todos los usuarios. Gracias por su atención.");

        echo "<a href='mailto:?bcc=$to&subject=$asunto&body=$cuerpo' onclick='marcarTodosEnviados()'>
                <button id='btnEnviar'>Enviar a todos</button>
              </a>";
    } else {
        echo "<button disabled>No hay usuarios pendientes</button>";
    }

    echo "<hr><h3>Listado de usuarios</h3>";
    $resultadoTodos = $conn->query("SELECT * FROM users WHERE Taller = '$opc'");
    echo "<table border='1' cellpadding='8'><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Estado</th><th>Grupo</th> </tr>";
    while ($usuario = $resultadoTodos->fetch_assoc()) {
        echo "<tr>
                <td>{$usuario['ID']}</td>
                <td>{$usuario['Nombre']}</td>
                <td>{$usuario['Correo']}</td>
                <td>{$usuario['Estado']}</td>
                <td>{$usuario['Taller']}</td>

              </tr>";
    }
    echo "</table>";

    $conn->close();
    ?>
    
    <?php 
    
////////////////////////////////////////////////////////////////////////////////
?>
    </table>
    <?php

    } else if($opc == 'Creacion y confeccion de prendas') {
        $b = true;
     $resultado = $conn->query("SELECT * FROM users WHERE estado = '0'");

    $correos = [];
    $listaUsuarios = [];

    while ($usuario = $resultado->fetch_assoc()) {
        $correos[] = $usuario['Correo'];
        $listaUsuarios[] = [
            'nombre' => $usuario['Nombre'],
            'correo' => $usuario['Correo']
        ];
    }

    if (count($correos) > 0) {
        $to = implode(",", $correos);
        $asunto = urlencode("Notificación general importante");
        $cuerpo = urlencode("Hola,\n\nEste es un aviso general para todos los usuarios. Gracias por su atención.");

        echo "<a href='mailto:?bcc=$to&subject=$asunto&body=$cuerpo' onclick='marcarTodosEnviados()'>
                <button id='btnEnviar'>Enviar a todos</button>
              </a>";
    } else {
        echo "<button disabled>No hay usuarios pendientes</button>";
    }

    echo "<hr><h3>Listado de usuarios</h3>";
    $resultadoTodos = $conn->query("SELECT * FROM users WHERE Taller = '$opc'");
    echo "<table border='1' cellpadding='8'><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Estado</th><th>Grupo</th> </tr>";
    while ($usuario = $resultadoTodos->fetch_assoc()) {
        echo "<tr>
                <td>{$usuario['ID']}</td>
                <td>{$usuario['Nombre']}</td>
                <td>{$usuario['Correo']}</td>
                <td>{$usuario['Estado']}</td>
                <td>{$usuario['Taller']}</td>

              </tr>";
    }
    echo "</table>";

    $conn->close();
    ?>

    <?php 

    } else if($opc == 'Electricidad') {
        $c = true;
        $resultado = $conn->query("SELECT * FROM users WHERE estado = '0'");

    $correos = [];
    $listaUsuarios = [];

    while ($usuario = $resultado->fetch_assoc()) {
        $correos[] = $usuario['Correo'];
        $listaUsuarios[] = [
            'nombre' => $usuario['Nombre'],
            'correo' => $usuario['Correo']
        ];
    }

    if (count($correos) > 0) {
        $to = implode(",", $correos);
        $asunto = urlencode("Notificación general importante");
        $cuerpo = urlencode("Hola,\n\nEste es un aviso general para todos los usuarios. Gracias por su atención.");

        echo "<a href='mailto:?bcc=$to&subject=$asunto&body=$cuerpo' onclick='marcarTodosEnviados()'>
                <button id='btnEnviar'>Enviar a todos</button>
              </a>";
    } else {
        echo "<button disabled>No hay usuarios pendientes</button>";
    }

    echo "<hr><h3>Listado de usuarios</h3>";
    $resultadoTodos = $conn->query("SELECT * FROM users WHERE Taller = '$opc'");
    echo "<table border='1' cellpadding='8'><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Estado</th><th>Grupo</th> </tr>";
    while ($usuario = $resultadoTodos->fetch_assoc()) {
        echo "<tr>
                <td>{$usuario['ID']}</td>
                <td>{$usuario['Nombre']}</td>
                <td>{$usuario['Correo']}</td>
                <td>{$usuario['Estado']}</td>
                <td>{$usuario['Taller']}</td>

              </tr>";
    }
    echo "</table>";

    $conn->close();
    ?>

    <?php 
    ?>
    </table>
    <?php

    } else if($opc == 'Estilismo y diseño de imagen') {
        $b = true;
     $resultado = $conn->query("SELECT * FROM users WHERE estado = '0'");

    $correos = [];
    $listaUsuarios = [];

    while ($usuario = $resultado->fetch_assoc()) {
        $correos[] = $usuario['Correo'];
        $listaUsuarios[] = [
            'nombre' => $usuario['Nombre'],
            'correo' => $usuario['Correo']
        ];
    }

    if (count($correos) > 0) {
        $to = implode(",", $correos);
        $asunto = urlencode("Notificación general importante");
        $cuerpo = urlencode("Hola,\n\nEste es un aviso general para todos los usuarios. Gracias por su atención.");

        echo "<a href='mailto:?bcc=$to&subject=$asunto&body=$cuerpo' onclick='marcarTodosEnviados()'>
                <button id='btnEnviar'>Enviar a todos</button>
              </a>";
    } else {
        echo "<button disabled>No hay usuarios pendientes</button>";
    }

    echo "<hr><h3>Listado de usuarios</h3>";
    $resultadoTodos = $conn->query("SELECT * FROM users WHERE Taller = '$opc'");
    echo "<table border='1' cellpadding='8'><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Estado</th><th>Grupo</th> </tr>";
    while ($usuario = $resultadoTodos->fetch_assoc()) {
        echo "<tr>
                <td>{$usuario['ID']}</td>
                <td>{$usuario['Nombre']}</td>
                <td>{$usuario['Correo']}</td>
                <td>{$usuario['Estado']}</td>
                <td>{$usuario['Taller']}</td>

              </tr>";
    }
    echo "</table>";

    $conn->close();
    ?>

    <?php 

    } else if($opc == 'Gastronomia') {
        $c = true;
        $resultado = $conn->query("SELECT * FROM users WHERE estado = '0'");

    $correos = [];
    $listaUsuarios = [];

    while ($usuario = $resultado->fetch_assoc()) {
        $correos[] = $usuario['Correo'];
        $listaUsuarios[] = [
            'nombre' => $usuario['Nombre'],
            'correo' => $usuario['Correo']
        ];
    }

    if (count($correos) > 0) {
        $to = implode(",", $correos);
        $asunto = urlencode("Notificación general importante");
        $cuerpo = urlencode("Hola,\n\nEste es un aviso general para todos los usuarios. Gracias por su atención.");

        echo "<a href='mailto:?bcc=$to&subject=$asunto&body=$cuerpo' onclick='marcarTodosEnviados()'>
                <button id='btnEnviar'>Enviar a todos</button>
              </a>";
    } else {
        echo "<button disabled>No hay usuarios pendientes</button>";
    }

    echo "<hr><h3>Listado de usuarios</h3>";
    $resultadoTodos = $conn->query("SELECT * FROM users WHERE Taller = '$opc'");
    echo "<table border='1' cellpadding='8'><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Estado</th><th>Grupo</th> </tr>";
    while ($usuario = $resultadoTodos->fetch_assoc()) {
        echo "<tr>
                <td>{$usuario['ID']}</td>
                <td>{$usuario['Nombre']}</td>
                <td>{$usuario['Correo']}</td>
                <td>{$usuario['Estado']}</td>
                <td>{$usuario['Taller']}</td>

              </tr>";
    }
    echo "</table>";

    $conn->close();
    ?>

    <?php 
    ?>
    </table>
    <?php

    } else if($opc == 'Hojalateria y pintura') {
        $b = true;
     $resultado = $conn->query("SELECT * FROM users WHERE estado = '0'");

    $correos = [];
    $listaUsuarios = [];

    while ($usuario = $resultado->fetch_assoc()) {
        $correos[] = $usuario['Correo'];
        $listaUsuarios[] = [
            'nombre' => $usuario['Nombre'],
            'correo' => $usuario['Correo']
        ];
    }

    if (count($correos) > 0) {
        $to = implode(",", $correos);
        $asunto = urlencode("Notificación general importante");
        $cuerpo = urlencode("Hola,\n\nEste es un aviso general para todos los usuarios. Gracias por su atención.");

        echo "<a href='mailto:?bcc=$to&subject=$asunto&body=$cuerpo' onclick='marcarTodosEnviados()'>
                <button id='btnEnviar'>Enviar a todos</button>
              </a>";
    } else {
        echo "<button disabled>No hay usuarios pendientes</button>";
    }

    echo "<hr><h3>Listado de usuarios</h3>";
    $resultadoTodos = $conn->query("SELECT * FROM users WHERE Taller = '$opc'");
    echo "<table border='1' cellpadding='8'><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Estado</th><th>Grupo</th> </tr>";
    while ($usuario = $resultadoTodos->fetch_assoc()) {
        echo "<tr>
                <td>{$usuario['ID']}</td>
                <td>{$usuario['Nombre']}</td>
                <td>{$usuario['Correo']}</td>
                <td>{$usuario['Estado']}</td>
                <td>{$usuario['Taller']}</td>

              </tr>";
    }
    echo "</table>";

    $conn->close();
    ?>

    <?php 

    } else if($opc == 'Ingles') {
        $c = true;
        $resultado = $conn->query("SELECT * FROM users WHERE estado = '0'");

    $correos = [];
    $listaUsuarios = [];

    while ($usuario = $resultado->fetch_assoc()) {
        $correos[] = $usuario['Correo'];
        $listaUsuarios[] = [
            'nombre' => $usuario['Nombre'],
            'correo' => $usuario['Correo']
        ];
    }

    if (count($correos) > 0) {
        $to = implode(",", $correos);
        $asunto = urlencode("Notificación general importante");
        $cuerpo = urlencode("Hola,\n\nEste es un aviso general para todos los usuarios. Gracias por su atención.");

        echo "<a href='mailto:?bcc=$to&subject=$asunto&body=$cuerpo' onclick='marcarTodosEnviados()'>
                <button id='btnEnviar'>Enviar a todos</button>
              </a>";
    } else {
        echo "<button disabled>No hay usuarios pendientes</button>";
    }

    echo "<hr><h3>Listado de usuarios</h3>";
    $resultadoTodos = $conn->query("SELECT * FROM users WHERE Taller = '$opc'");
    echo "<table border='1' cellpadding='8'><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Estado</th><th>Grupo</th> </tr>";
    while ($usuario = $resultadoTodos->fetch_assoc()) {
        echo "<tr>
                <td>{$usuario['ID']}</td>
                <td>{$usuario['Nombre']}</td>
                <td>{$usuario['Correo']}</td>
                <td>{$usuario['Estado']}</td>
                <td>{$usuario['Taller']}</td>

              </tr>";
    }
    echo "</table>";

    $conn->close();
    ?>

    <?php 

    } else if($opc == 'Mecanica automotriz') {
        $c = true;
        $resultado = $conn->query("SELECT * FROM users WHERE estado = '0'");

    $correos = [];
    $listaUsuarios = [];

    while ($usuario = $resultado->fetch_assoc()) {
        $correos[] = $usuario['Correo'];
        $listaUsuarios[] = [
            'nombre' => $usuario['Nombre'],
            'correo' => $usuario['Correo']
        ];
    }

    if (count($correos) > 0) {
        $to = implode(",", $correos);
        $asunto = urlencode("Notificación general importante");
        $cuerpo = urlencode("Hola,\n\nEste es un aviso general para todos los usuarios. Gracias por su atención.");

        echo "<a href='mailto:?bcc=$to&subject=$asunto&body=$cuerpo' onclick='marcarTodosEnviados()'>
                <button id='btnEnviar'>Enviar a todos</button>
              </a>";
    } else {
        echo "<button disabled>No hay usuarios pendientes</button>";
    }

    echo "<hr><h3>Listado de usuarios</h3>";
    $resultadoTodos = $conn->query("SELECT * FROM users WHERE Taller = '$opc'");
    echo "<table border='1' cellpadding='8'><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Estado</th><th>Grupo</th> </tr>";
    while ($usuario = $resultadoTodos->fetch_assoc()) {
        echo "<tr>
                <td>{$usuario['ID']}</td>
                <td>{$usuario['Nombre']}</td>
                <td>{$usuario['Correo']}</td>
                <td>{$usuario['Estado']}</td>
                <td>{$usuario['Taller']}</td>

              </tr>";
    }
    echo "</table>";

    $conn->close();
    ?>

    <?php 
}
?>