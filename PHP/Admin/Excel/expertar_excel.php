<?php
    $conexion = new mysqli("localhost", "root", "", "main");

    // ---configuracion para excel --
    header("Content-Type:application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=inscripciones_filtrados.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    //--filtros a tomas en cuenta ---
    $modalidad=$_GET['opciones_modalidad'] ??'';
    $periodo= $GET['opciones-periodo'] ??'';
    $buscar = $GET['buscar_input'] ??'';

    //se construye la consulta
    $sql="SELECT * FROM inscripciones WHERE 1";
    if(!empty($modalidad)){
        $sql.="AND modalidad ='".$conexion->real_escape_string($modalidad) . "'"; 
    }
    if(!empty($periodo)){
        $sql .="AND Periodo= '". $conexion->real_escape_string($periodo) . "'";
    }
    if (!empty($buscar)) {
    $buscar = $conexion->real_escape_string($buscar);
    $sql .= " AND (Nombre LIKE '%$buscar%' OR CURP LIKE '%$buscar%' OR Correo LIKE '%$buscar%')";
}
$resultado = $conexion->query($sql);

// --- Iniciando tabla de excel ---
echo "<table border='1'>
        <thead>
            <tr>
                <th>ID</th>
                <th>CURP</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Periodo</th>
                <th>Modalidad</th>
                <th>Forma de Pago</th>
                <th>Documentos</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>";
        
// --- Llenado de tabla ---
while ($row = $resultado->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['CURP']}</td>
            <td>{$row['Nombre']}</td>
            <td>{$row['Correo']}</td>
            <td>{$row['Telefono']}</td>
            <td>{$row['Periodo']}</td>
            <td>{$row['Modalidad']}</td>
            <td>{$row['Forma_de_Pago']}</td>
            <td>{$row['Documentos']}</td>
            <td>{$row['Estatus']}</td>
          </tr>";
}

echo "</tbody></table>";
?>