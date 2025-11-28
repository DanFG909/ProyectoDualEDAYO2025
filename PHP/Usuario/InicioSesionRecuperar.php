<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar Contraseña</title>
  <link rel="stylesheet" href="../../CSS/Inicio_Sesion.css">
</head>
<body>
  <div id="modalForm" class="modal" style="display: flex;">
    <div class="form-wrapper">
      <form action="InicioSesionRecovery.php" method="POST">
        <div  class="close-wrapper">
          <button class="close" onclick="window.location.href='Inicio_Sesion.php'">&times;</button>
        </div>
        <fieldset>
          <legend>Recuperar Contraseña</legend>

          <div class="form-row">
            <div class="form-col">
              <label for="correo">Correo registrado</label>
              <input type="email" name="correo" placeholder="Introduce tu correo registrado" required>
            </div>

            <button type="submit">Enviar Codigo</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</body>
</html>