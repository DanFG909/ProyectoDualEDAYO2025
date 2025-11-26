<?php 
    $conexion = new mysqli("localhost","root","","main");

    if($conexion) {
     
    }else {
        echo "No se encontró la base de datos"; 
    }
?>