<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Restablecer Contraseña</title>
  <link rel="stylesheet" href="CSS/Inicio_Sesion.css">
</head>
<body>
  <div id="modalForm" class="modal" style="display: flex;">
    <div class="form-wrapper">
      <form action="InicioSesionUpdate.php" method="POST">
        <fieldset>
          <legend>Restablecer contraseña</legend>

          <div class="form-row">
            <div class="form-col">
              <label for="correo">Correo registrado</label>
              <input type="email" name="correo" placeholder="Ingrese su correo registrado" required>
            </div>

            <div class="form-col">
              <label for="codigo">Codigo recibido</label>
              <input type="text" name="codigo" placeholder="Ingrese el código de recuperacion recibido" required>
            </div>

            <div class="form-col">
              <label for="correo">Nueva contraseña</label>
              <input type="password" name="nueva_pass" placeholder="Ingrese su nueva contraseña" required>
              <h6>Asegurese de resguardar correctamente su contraseña</h6>
            </div>

            <button type="submit">Cambiar contraseña</button>

            <center style="margin-top: 15px;">
              <a href="Inicio_Sesion.php">Omitir</a>
              <h5>Si omite no se inciara sesion y tendra que ingresar su contraseña anterior</h5>
            </center>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</body>
</html>