<?php
$conexion = new mysqli("localhost", "root", "", "main");

if ($conexion->connect_error) {
    die("Error de conexión");
}

$busqueda = isset($_GET['buscar_input']) ? $conexion->real_escape_string($_GET['buscar_input']) : '';

$sql = "SELECT * FROM usuarios_admin
        WHERE Nombre LIKE '%$busqueda%' 
           OR Apellidos LIKE '%$busqueda%' 
           OR Correo LIKE '%$busqueda%'";

$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "Nombre: " . $fila['Nombre'] . "<br>";
        echo "Apellidos: " . $fila['Apellidos'] . "<br>";
        echo "Correo: " . $fila['Correo'] . "<br><hr>";
    }
} else {
    echo "NO_ENCONTRADO";
}

$conexion->close();
?>
