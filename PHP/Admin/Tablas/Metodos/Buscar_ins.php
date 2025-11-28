<?php
$conexion = new mysqli("localhost", "root", "", "main");

if ($conexion->connect_error) {
    die("Error de conexión");
}

$busqueda = isset($_GET['buscar_input']) ? $conexion->real_escape_string($_GET['buscar_input']) : '';

$sql = "SELECT * FROM inscripciones
        WHERE CURP LIKE '%$busqueda%' 
           OR Nombre LIKE '%$busqueda%' 
           OR Correo LIKE '%$busqueda%'";

$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "CURP: " . $fila['CURP'] . "<br>";
        echo "Nombre: " . $fila['Nombre'] . "<br>";
        echo "Correo: " . $fila['Correo'] . "<br><hr>";
        echo "Telefono: " . $fila['Telefono'] . "<br><hr>";
        echo "Periodo: " . $fila['Correo'] . "<br><hr>";
        echo "Modalidad: " . $fila['Telefono'] . "<br><hr>";
        echo "Forma de Pago: " . $fila['Forma_de_Pago'] . "<br><hr>";
        echo "Documentos: " . $fila['Documentos'] . "<br><hr>";

        echo "-------------------------------------------------------" . "<br><hr>";
    }
} else {
    echo "NO_ENCONTRADO";
}

$conexion->close();
?>