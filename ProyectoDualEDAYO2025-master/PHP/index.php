<?php include('Conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EDAYO Zinacantepec</title>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 
 <link rel="stylesheet" href="/ProyectoDualEDAYO2025-master/CSS/Style_VistaInfo.css">

</head>
<body>
  <!-- Encabezado -->
  <header class="encabezado">
    <div class="logo">
      <img src="/ProyectoDualEDAYO2025-master/Images/logo.png" alt="Logo EDAYO">
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
      <img src="/ProyectoDualEDAYO2025-master/Images/edayo.jpg" alt="EDAYO Imagen">
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
        <img src="/ProyectoDualEDAYO2025-master/Images/cea-logo.png" alt="Curso 1">
        <p>CEA</p>
        <br>
        <p>Para beneficiar a las comunidades mexiquenses, el ICATI ofrece cursos que desarrollan los 
        conocimientos y habilidades de las personas que requieren capacitarse en corto tiempo para 
        incorporarse al mercado laboral por medio del empleo o autoempleo formales.</p>  </div>
      
      <div class="curso">
        <img src="/ProyectoDualEDAYO2025-master/Images/cem-logo.png" alt="Curso 2">
        <p>CEM</p>
        <br>
      <p>La de Capacitación Emprendedora ofrece una ruta de servicios de capacitación y
         vinculación a los egresados del IACTI y al público en general que desee obtener conocimientos
         gerenciales, así como herramientas técnicas para diseñar o implementar un proyecto productivo, 
         fomentando el autoempleo y el empleo formal.</p> </div>
      
      <div class="curso">
        <img src="/ProyectoDualEDAYO2025-master/Images/cae-logo.png" alt="Curso 3">
        <p>CAE</p>
        <br>
       <p>Para impulsar la productividad de las empresas en el ICATI, 
        ofrece cursos diseñados para satisfacer las necesidades de los 
        sectores privado, público y social, con la finalidad de contribuir 
        con el desarrollo económico de los mexiquenses</p> </div>

      <div class="curso">
        <img src="/ProyectoDualEDAYO2025-master/Images/escolarizado-logo.png" alt="Curso 4">
        <p>Escolarizado</p>
        <br>
       <p>El Instituto de Capacitación y Adiestramiento para el Trabajo Industrial (ICATI), 
        tiene como objetivo brindar capacitación para el trabajo, en el trabajo, para comunidades, 
        para organizaciones y dependencias</p>  </div>

    </div>
  </section>

  
 <section class="disp">
    
     <main class="contenido">
    <section class="cursos-disp">

   <h1>Cursos Disponibles</h1>

  <div class="grid-cursos">
    <?php
      $sql = "SELECT * FROM cursos_disponibles";
      $resultado = $conexion->query($sql);

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

     $conexion->close(); 
    ?>
  </div>
    </section>
  </main>

  </section>
    

 <main class="contenido">



  <section class="icati">
     <div class="container">
    <header>
      <h1>Instituto de Capacitación y Adiestramiento para el Trabajo Industrial (ICATI)</h1>
    </header>

    <section id="info">
      <h2>¿Qué es el ICATI?</h2>
      <p>
        El <strong>Instituto de Capacitación y Adiestramiento para el Trabajo Industrial (ICATI)</strong>
        es un organismo público descentralizado del Gobierno del Estado de México,
        dedicado a la formación, capacitación y adiestramiento laboral de la población.
        Su labor busca fortalecer las competencias técnicas y profesionales de las personas,
        para facilitar su inserción o permanencia en el mercado laboral y promover el desarrollo económico del estado.
      </p>
    </section>

    <section id="info">
      <h2>Propósitos del ICATI</h2>
      <ul>
        <li>Proporcionar servicios de capacitación para y en el trabajo con base en las necesidades productivas de la región.</li>
        <li>Fomentar la competitividad laboral mediante el desarrollo de habilidades técnicas y humanas.</li>
        <li>Impulsar la formación de capital humano calificado para fortalecer el desarrollo económico y social.</li>
        <li>Promover oportunidades de superación personal y profesional en la población mexiquense.</li>
      </ul>
    </section>

    <section id="info">
      <h2>Misión</h2>
      <p>
        Proporcionar servicios de capacitación laboral de calidad que contribuyan al desarrollo de competencias y habilidades en la población mexiquense,
        con el propósito de mejorar su desempeño, productividad y condiciones de vida, fortaleciendo al mismo tiempo la economía del Estado de México.
      </p>
    </section>

    <section id="info">
      <h2>Visión</h2>
      <p>
        Ser un organismo líder en la formación y capacitación laboral, reconocido por la calidad y pertinencia de sus programas,
        su innovación pedagógica y su impacto positivo en la empleabilidad y el desarrollo sostenible del Estado de México.
      </p>
    </section>

    <section id="info">
      <h2>Objetivo General</h2>
      <p>
        Brindar capacitación integral que permita a las personas adquirir o actualizar conocimientos, habilidades y actitudes,
        favoreciendo su incorporación, permanencia o promoción en el ámbito laboral, y coadyuvando al fortalecimiento del desarrollo productivo y social del estado.
      </p>
    </section>
    <footer>
      <p><em>Fuente: Catálogo de Cursos CEA 2025 — ICATI, Gobierno del Estado de México.</em></p>
    </footer>
  </div>
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
