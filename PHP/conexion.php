<?php 
    $conexion = new mysqli("localhost","root","","t_noviembre");

    if($conexion) {
       echo "Conectado :D"; 
    }else {
        echo "No se encontró la base de datos"; 
    }
?>