<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "main");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta solo los cursos activos
$sql = "SELECT * FROM cursos_disponibles WHERE activo = 1";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filtración de Cursos - CEA</title>
  <link rel="stylesheet" href="/ProyectoDualEDAYO2025/CSS/style_inscripcion.css">
  <!-- Ioncon-->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>

  
  <header class="encabezado">
    <div class="logo">
      <img src="ProyectoDualEDAYO2025/Images/logo.png" alt="Logo EDAYO">
      <div class="texto">
        <h2>EXPOAPRENDE</h2>
        <p>EDAYO ZINACANTEPEC</p>
      </div>
    </div>
   
     <nav>
      <a href="/ProyectoDualEDAYO2025/PHP/Index.php">Inicio</a>
      <a href="#">Recordatorio</a>
      <a href="#">Contacto</a>
    </nav>

     <div class="perfil">
      <img src="https://i.imgur.com/ZKZC4zR.png" alt="perfil">
    </div>
    
  </header>

 <section class="cursos">
    <h2>CURSOS DISPONIBLES</h2>
    <div class="contenedor-cursos">
   <?php
    if ($result->num_rows > 0) {
        while ($curso = $result->fetch_assoc()) {
            echo "
            <div class='curso'>
              <img src='{$curso['imagen']}' alt='{$curso['nombre']}'>
              <h3>{$curso['nombre']}</h3>
              <form action='ProyectoDualEDAYO2025/PHP/Formulario_inscripcion.php' method='POST'>
                <input type='hidden' name='curso_id' value='{$curso['id']}'>
                <button type='submit'>Inscribirse</button>
              </form>
            </div>
            ";
        }
    } else {
        echo "<p>No hay cursos disponibles por el momento.</p>";
    }
    ?>

    </div>
  </section>

  <!-- Footer -->
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
