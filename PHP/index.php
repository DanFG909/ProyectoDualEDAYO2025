<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICATI</title>
    <link rel="stylesheet" href="../CSS/Menu.css">
    <style>
  :root {
  --rojo-oscuro: #7A0000;
  --rojo-medio: #C8102E;
  --dorado: #E0B94D;
  --amarillo-suave: #FDF5C9;
  --gris-fondo: #F5F5F7;
  --gris-texto: #2E2E2E;
  --blanco: #FFFFFF;
  --sombra: rgba(0, 0, 0, 0.15);
}

/* Estilo general */
body {
  font-family: "Poppins", "Segoe UI", Roboto, sans-serif;
  line-height: 1.7;
  background: var(--gris-fondo);
  color: var(--gris-texto);
  padding: 2.5rem;
  margin: 0;
}

/* Contenedor principal */
.container {
  max-width: 950px;
  margin: auto;
  background: var(--blanco);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 8px 24px var(--sombra);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.container:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 28px rgba(0, 0, 0, 0.18);
}

/* Encabezado */
header {
  background: linear-gradient(120deg, var(--rojo-oscuro), var(--rojo-medio));
  color: var(--blanco);
  padding: 2.5rem 2rem;
  text-align: center;
  border-bottom: 6px solid var(--dorado);
  position: relative;
  overflow: hidden;
}

header::after {
  content: "";
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at top right, rgba(255,255,255,0.15), transparent 70%);
}

header h1 {
  margin: 0;
  font-size: 2.2rem;
  letter-spacing: 0.7px;
  text-shadow: 0 2px 6px rgba(0,0,0,0.3);
  animation: aparecer 1s ease-out;
}

/* Secciones */
section {
  padding: 2rem 2.5rem;
  animation: fadeIn 0.6s ease both;
}

h2 {
  color: var(--rojo-oscuro);
  border-left: 6px solid var(--dorado);
  padding-left: 12px;
  margin-bottom: 1rem;
  font-size: 1.35rem;
  position: relative;
}

h2::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -6px;
  width: 40px;
  height: 3px;
  background: var(--rojo-medio);
  border-radius: 3px;
}

p {
  margin: 0.5rem 0 1.5rem;
  text-align: justify;
}

/* Listas */
ul {
  margin: 0.8rem 0 0 1.5rem;
  padding: 0;
}

li {
  margin-bottom: 0.7rem;
  position: relative;
  padding-left: 10px;
}

li::before {
  content: "•";
  color: var(--rojo-medio);
  font-weight: bold;
  position: absolute;
  left: -12px;
}

/* Pie de página */
footer {
  background: var(--rojo-oscuro);
  color: var(--amarillo-suave);
  text-align: center;
  padding: 1.2rem;
  font-size: 0.95rem;
  letter-spacing: 0.4px;
  border-top: 4px solid var(--dorado);
  box-shadow: inset 0 3px 8px rgba(0, 0, 0, 0.2);
}

/* Destacar palabras */
strong {
  color: var(--rojo-medio);
  font-weight: 600;
}

/* Animaciones suaves */
@keyframes aparecer {
  from { opacity: 0; transform: translateY(-20px); }
  to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
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
        <a href="Crear_cuenta.php">Iniciar Sesion</a>
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