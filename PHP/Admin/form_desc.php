<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Descargar archivos</title>
</head>
<body>
    <form action="descarga.php" method="get">
        <label>ID del usuario:</label>
        <input type="number" name="user_id" required>

        <label>Archivo:</label>
        <select name="tipo" required>
            <option value="ine">INE</option>
            <option value="comprobante">Comprobante</option>
        </select>

        <button type="submit">Descargar</button>
    </form>
</body>
</html>
