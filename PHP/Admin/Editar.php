<?php
include("conexion.php");
$conexioon = new mysqli("localhost","root","","main");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM usuarios_admin WHERE id = $id";
    $resultado = $conexioon->query($query);
    $row = $resultado->fetch_assoc();
}
?>

    <form action="Actualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            Nombre: <input type="text" name="Nombre" value="<?php echo $row['Nombre']; ?>"><br>
            Apellidos: <input type="text" name="Apellidos" value="<?php echo $row['Apellidos']; ?>"><br>
            Correo: <input type="email" name="Correo" value="<?php echo $row['Correo']; ?>"><br>
        <input type="submit" value="Actualizar">
    </form>
