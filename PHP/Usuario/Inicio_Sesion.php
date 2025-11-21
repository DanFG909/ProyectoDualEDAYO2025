<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="/ProyectoDualEDAYO2025/CSS/Inicio_Sesion2.css">
</head>
<body>

  <div id="modalForm" class="modal" style="display: flex;">

    <div class="modal-content">

        <span class="close" id="cerrarModal">&times;</span>

        <form action="InicioSesionProcess.php" method="POST">
            <fieldset>
                <legend>Iniciar Sesión</legend>

                <div class="form-row">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" name="correo" id="correo" placeholder="Ingresa tu correo" required>

                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña" required>
                </div>

                <button type="submit">Entrar</button>

                <center style="margin-top: 15px;">
                    <a href="InicioSesionRecuperar.php">¿Olvidaste tu contraseña?</a>
                    <p></p>
                     <a href="Registrarse.php">¿No tienes cuenta? Registrate</a>
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