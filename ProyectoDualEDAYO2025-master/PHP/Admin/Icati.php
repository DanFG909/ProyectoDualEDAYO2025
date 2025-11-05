<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICATI</title>
    <link rel="stylesheet" href="CSS/Menu.css">
    <style>
    :root {
      --rojo-oscuro: #8B0000;
      --rojo-medio: #C8102E;
      --dorado: #D4AF37;
      --amarillo-suave: #FBE7A1;
      --gris-fondo: #F6F6F6;
      --gris-texto: #333333;
      --blanco: #FFFFFF;
    }

    body {
      background-image: url('Images/edayo.jpg');
      font-family: "Segoe UI", Roboto, Arial, sans-serif;
      line-height: 1.6;
      background: var(--gris-fondo);
      color: var(--gris-texto);
      padding: 2rem;
    }

    .container {
      max-width: 900px;
      margin: auto;
      background: var(--blanco);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    }

    header {
      background: linear-gradient(90deg, var(--rojo-oscuro), var(--rojo-medio));
      color: var(--blanco);
      padding: 2rem;
      text-align: center;
      border-bottom: 5px solid var(--dorado);
    }

    header h1 {
      margin: 0;
      font-size: 1.9rem;
      letter-spacing: 0.5px;
    }

    section {
      padding: 1.8rem 2rem;
    }

    h2 {
      color: var(--rojo-oscuro);
      border-left: 6px solid var(--dorado);
      padding-left: 10px;
      margin-bottom: 0.8rem;
      font-size: 1.25rem;
    }

    p {
      margin: 0.5rem 0 1.2rem;
      text-align: justify;
    }

    ul {
      margin: 0.5rem 0 0 1.5rem;
      padding: 0;
    }

    li {
      margin-bottom: 0.6rem;
    }

    footer {
      background: var(--rojo-oscuro);
      color: var(--amarillo-suave);
      text-align: center;
      padding: 1rem;
      font-size: 0.9rem;
      letter-spacing: 0.3px;
      border-top: 3px solid var(--dorado);
    }

    strong {
      color: var(--rojo-medio);
    }
  </style>
</head>
<body>
    <h1><center>Instituto de Capacitacion y Adiestramiento para el Trabajo Industrial - ICATI</center></h1>

    <div class="navbar">
      <div class="dropdown">
        <a href="Icati.php">Inicio</a>
      </div> 
      <div class="dropdown">
        <button class="dropbtn">Cursos
        </button>
        <div class="dropdown-content">
          <a href="Cursos.php"><img src="#" alt="">Cursos CEA</a>
          <a href="Inscripcion_Curso.php"><img src="#" alt="">Registrarme a un curso</a>
          <a href="Mis_Cursos.php"><img src="#" alt="">Mis cursos</a>
        </div>
      </div> 
      <div class="dropdown">
        <button class="dropbtn">Tablas
        </button>
        <div class="dropdown-content">
          <a hre9f="TablaProblematicas.php"><img src="Imagenes/Tabla.svg" alt=""><img src="Imagenes/Registro.svg" alt=""> Tabla de Logros</a>
        </div>
      </div> 
      <div class="dropdown">
        <a href="Inicio_Sesion.php">Iniciar Sesion</a>
      </div> 
    </div>


  <div class="container">
    <header>
      <h1>Instituto de Capacitación y Adiestramiento para el Trabajo Industrial (ICATI)</h1>
    </header>

    <section id="definicion">
      <h2>¿Qué es el ICATI?</h2>
      <p>
        El <strong>Instituto de Capacitación y Adiestramiento para el Trabajo Industrial (ICATI)</strong>
        es un organismo público descentralizado del Gobierno del Estado de México,
        dedicado a la formación, capacitación y adiestramiento laboral de la población.
        Su labor busca fortalecer las competencias técnicas y profesionales de las personas,
        para facilitar su inserción o permanencia en el mercado laboral y promover el desarrollo económico del estado.
      </p>
    </section>

    <section id="propositos">
      <h2>Propósitos del ICATI</h2>
      <ul>
        <li>Proporcionar servicios de capacitación para y en el trabajo con base en las necesidades productivas de la región.</li>
        <li>Fomentar la competitividad laboral mediante el desarrollo de habilidades técnicas y humanas.</li>
        <li>Impulsar la formación de capital humano calificado para fortalecer el desarrollo económico y social.</li>
        <li>Promover oportunidades de superación personal y profesional en la población mexiquense.</li>
      </ul>
    </section>

    <section id="mision">
      <h2>Misión</h2>
      <p>
        Proporcionar servicios de capacitación laboral de calidad que contribuyan al desarrollo de competencias y habilidades en la población mexiquense,
        con el propósito de mejorar su desempeño, productividad y condiciones de vida, fortaleciendo al mismo tiempo la economía del Estado de México.
      </p>
    </section>

    <section id="vision">
      <h2>Visión</h2>
      <p>
        Ser un organismo líder en la formación y capacitación laboral, reconocido por la calidad y pertinencia de sus programas,
        su innovación pedagógica y su impacto positivo en la empleabilidad y el desarrollo sostenible del Estado de México.
      </p>
    </section>

    <section id="objetivo-general">
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
</body>
</html>