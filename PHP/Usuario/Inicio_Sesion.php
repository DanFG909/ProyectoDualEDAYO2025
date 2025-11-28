<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="../../CSS/Inicio_Sesion.css">
</head>
<body>

  <div id="modalForm" class="modal" style="display: flex;">
    <div class="form-wrapper">
      <form action="InicioSesionProcess.php" method="POST">
      <div class="close-wrapper">
      <button class="close" onclick="window.location.href='Icati.php'">&times;</button>
      </div>
        <fieldset>
          <legend>Iniciar Sesión</legend>

          <div class="form-row">
            <div class="form-col">
              <label for="correo">Correo electrónico</label>
              <input type="email" name="correo" id="correo" placeholder="Ingresa tu correo" required>
            </div>

            <div class="form-col">
              <label for="password">Contraseña</label>
              <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña" required>
            </div>
          </div>

          <button type="submit">Entrar</button>

          <center style="margin-top: 15px;">
            <a href="InicioSesionRecuperar.php">¿Olvidaste tu contraseña?</a>
          </center>
          <center style="margin-top: 15px;">
            <a href="registro.html">¿Aun no tienes cuenta?</a>
          </center>

          <?php if(isset($_SESSION['error'])): ?>
            <p style="color:red; text-align:center; margin-top:10px;">
              <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </p>
          <?php endif; ?>
        </fieldset>
      </form>
    </div>
  </div>

</body>
</html>