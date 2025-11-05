<?php 
    $conexion = new mysqli("localhost","root","","main");

    if($conexion) {
       echo "Conectado :D"; 
    }else {
        echo "No se encontró la base de datos"; 
    }
?>