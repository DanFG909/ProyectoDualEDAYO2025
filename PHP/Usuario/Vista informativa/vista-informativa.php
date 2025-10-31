<?php include('Conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EDAYO Zinacantepec</title>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 <link rel="stylesheet" href="../../../CSS/Style_VistaInfo.css">

</head>
<body>
  <!-- Encabezado -->
  <header class="encabezado">
    <div class="logo">
      <img src="../../../Images/logo.png" alt="Logo EDAYO">
      <div class="texto">
        <h2>EXPOAPRENDE</h2>
        <p>EDAYO ZINACANTEPEC</p>
      </div>
    </div>

    <a href="#" class="login">Acerca de EDAYO</a>
    <a href="#" class="login">Talleres</a>
    <a href="#" class="login">Contactanos</a>
    <a href="#" class="login">Iniciar Sesión</a>

    
  </header>

  <!-- Textoo -->
  <section class="hero">
    <div class="hero-texto">
      <h1>Expo Aprende<br>EDAYO Zinacantepec.</h1>
      <a href="#" class="boton">¡Infórmate Ya!</a>
    </div>
    <div class="hero-img">
      <img src="../../../Images/edayo.jpg" alt="EDAYO Imagen">
    </div>
  </section>

  <!-- modalidad -->
  <section class="cursos">
      
    <h2>Acerca EDAYO Zinacantepec</h2>
    <p >
      Información sobre EDAYO y las opciones de aprendizaje disponibles para la comunidad.
    </p>
    <br>
    <div class="cursos-contenedor">

      <div class="curso">
        <img src="../../../Images/cea-logo.png" alt="Curso 1">
        <p>CEA</p>
        <br>
       <p>Reparación de equipos: Diagnóstico y reparación de fallas en dispositivos electrónicos.</p>
      </div>
      
      <div class="curso">
        <img src="../../../Images/cem-logo.png" alt="Curso 2">
        <p>CEM</p>
        <br>
       <p>Reparación de equipos: Diagnóstico y reparación de fallas en dispositivos electrónicos.</p>
      </div>
      
      <div class="curso">
        <img src="../../../Images/cae-logo.png" alt="Curso 3">
        <p>CAE</p>
        <br>
       <p>Reparación de equipos: Diagnóstico y reparación de fallas en dispositivos electrónicos.</p>
      </div>

      <div class="curso">
        <img src="../../../Images/escolarizado-logo.png" alt="Curso 4">
        <p>Escolarizado</p>
        <br>
       <p>Reparación de equipos: Diagnóstico y reparación de fallas en dispositivos electrónicos.</p>
      </div>

    </div>
  </section>

  
  <section class="disp">
    
     <main class="contenido">
    <section class="cursos-disp">
      <h1>Cursos Disponibles</h1>

       <div class="grid-cursos">
    <?php
      $sql = "SELECT * FROM cursos_disponibles";
      $resultado = $conn->query($sql);

      if ($resultado->num_rows > 0) {
        while($curso = $resultado->fetch_assoc()) {
          echo '
          <div class="class">
            <img src="'.$curso['Imagen'].'" alt="'.$curso['Nombre'].'">
            <h2>'.$curso['Nombre'].'</h2>
          
            <p>'.$curso['Descripcion'].'</p>
            <span><b>Duración:</b> '.$curso['Duracion'].'</span>
          </div>';
        }
      } else {
        echo "<p>No hay cursos disponibles.</p>";
      }

      $conn->close();
    ?>
  </div>
    </section>
  </main>

  </section>

  <section>
    <h2>Acerca de la feria</h2>
  </section>
  
  <footer class="footer">
                    <ul class="social-icon">
                        <li class="icon-elem">
                            <a href="" class="icon">
                             <ion-icon name="location-outline"></ion-icon>
                            </a>
                        </li>
                        <li class="icon-elem">
                            <a href="" class="icon">
                              <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>
                        <li class="icon-elem">
                            <a href="" class="icon">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>
                        
                    </ul>
                    <ul class="menu">
                        <li class="menu-elem">
                            <a href="" class="menu-icon">Inicio</a>
                        </li>
                        <li class="menu-elem">
                            <a href="" class="menu-icon">Informacion</a>
                        </li>
                        <li class="menu-elem">
                            <a href="" class="menu-icon">Contacto</a>
                        </li>
                        <li class="menu-elem">
                            <a href="" class="menu-icon">Cursos</a>
                        </li>
                    </ul>
                    <p class="text">| EDAYO Zinacantepe</p>
                </footer>
</body>
</html>
