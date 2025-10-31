<?php
$conexion = new mysqli("localhost", "root", "", "main");

if ($conexion->connect_error) {
    die("Error de conexión");
}

$busqueda = isset($_GET['buscar_input']) ? $conexion->real_escape_string($_GET['buscar_input']) : '';

$sql = "SELECT * FROM cursos
        WHERE id LIKE '%$busqueda%' 
           OR Nombre LIKE '%$busqueda%'";

$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila['id'] . "<br>";
        echo "Nombre: " . $fila['Nombre'] . "<br>";
        echo "Informacion: " . $fila['Informacion'] . "<br>";
        echo "Modalidad: " . $fila['Modalidad'] . "<br>";
        echo "Fecha: " . $fila['fecha_creacion'] . "<br>";
    }
} else {
    echo "NO ENCONTRADO";
}

$conexion->close();
?>
