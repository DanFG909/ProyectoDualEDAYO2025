<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notificación a todos</title>
    <link rel="stylesheet" href="Estilos/styletabla.css">
    <script>
    function marcarTodosEnviados() {
        fetch("marcar_enviado.php", {
            method: "POST"
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById("btnEnviar").innerText = "Enviado";
            document.getElementById("btnEnviar").disabled = true;
            alert("Estado actualizado correctamente.");
            location.reload(); // opcional: recargar para ver los cambios
        });
    }
    </script>
</head>
<body>
    <h2>Enviar notificación a todos</h2>

    <?php
    $conexion = new mysqli("localhost", "root", "", "servidor");
    $resultado = $conexion->query("SELECT * FROM usuarios WHERE estado_notificacion = 'pendiente'");

    $correos = [];
    $listaUsuarios = [];

    while ($usuario = $resultado->fetch_assoc()) {
        $correos[] = $usuario['email'];
        $listaUsuarios[] = [
            'nombre' => $usuario['nombre'],
            'email' => $usuario['email']
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
    $resultadoTodos = $conexion->query("SELECT * FROM usuarios");
    echo "<table border='1' cellpadding='8'><tr><th>Nombre</th><th>Email</th><th>Estado</th></tr>";
    while ($usuario = $resultadoTodos->fetch_assoc()) {
        echo "<tr>
                <td>{$usuario['nombre']}</td>
                <td>{$usuario['email']}</td>
                <td>{$usuario['estado_notificacion']}</td>
              </tr>";
    }
    echo "</table>";

    $conexion->close();
    ?>
</body>
</html>