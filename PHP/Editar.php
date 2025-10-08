<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM inscripciones WHERE id = $id";
    $resultado = $conn->query($query);
    $row = $resultado->fetch_assoc();
}
?>

    <form action="actualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            CURP: <input type="text" name="CURP" value="<?php echo $row['CURP']; ?>"><br>
            Nombre: <input type="text" name="Nombre" value="<?php echo $row['Nombre']; ?>"><br>
            Correo: <input type="email" name="Correo" value="<?php echo $row['Correo']; ?>"><br>
            Teléfono: <input type="text" name="Telefono" value="<?php echo $row['Telefono']; ?>"><br>
            Forma de Pago: <input type="text" name="Forma_de_Pago" value="<?php echo $row['Forma_de_Pago']; ?>"><br>
            Documentos: <input type="text" name="Documentos" value="<?php echo $row['Documentos']; ?>"><br>
        <input type="submit" value="Actualizar">
    </form>
