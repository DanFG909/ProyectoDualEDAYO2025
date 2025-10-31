<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EDAYO Zinacantepec</title>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <style>
       
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif;
  background-color: #fdf2f4;
  color: #111;
}


.encabezado {
  background-color: #ffffff;
  padding: 20px 50px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  display: flex;
  align-items: center;
}

.logo {
  display: flex;
  align-items: center;
}

.logo img {
  width: 130px;
  height: 70px;
  margin-right: 15px;
}

.logo .texto h2 {
  margin: 0;
  font-size: 22px;
  color: #8a3c3c;
  letter-spacing: 1px;
}

.logo .texto p {
  margin: 0;
  color: #a86f6f;
  font-size: 13px;
}

.login {
  color: #7a1522;
  font-weight: 600;
  text-decoration: none;
  margin-left: 160px;
}


.hero {
  background-color: #7a1522;
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 60px 10%;
  flex-wrap: wrap;
}

.hero-texto {
  flex: 1;
  min-width: 10px;
}

.hero-texto h1 {
  font-size: 4em;
  margin-bottom: 10px;
}

.hero-texto p {
  margin-bottom: 15px;
}

.boton {
  background-color: #fff;
  color: #6f1d34;
  padding: 10px 20px;
  border-radius: 20px;
  font-weight: 600;
  text-decoration: none;
  transition: 0.3s;
}

.boton:hover {
  background-color: #9b2e4d;
  color: white;
}

.hero-img {
  flex: 1;
  display: flex;
  justify-content: center;
}

.hero-img img {
  width: 600px;
  border-radius: 6px;
}


.cursos {
  background-color: #6e0d1a;
  color: white;
  text-align: center;
  padding: 50px 10%;
}

.cursos h2 {
  margin-bottom: 40px;
}

.cursos-contenedor {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 40px;
}

.curso {
  background-color: #fff;
  color: #4a121e;
  padding: 20px;
  border-radius: 10px;
  width: 300px;
  height: 250px;
  text-align: center;
  transition: transform 0.3s;
}

.curso:hover {
  transform: scale(1.05);
}

.curso img {
  width: 100px;
  height: 100px;
  margin-bottom: 10px;
}

.acerca {
  background-color: white;
  text-align: center;
  padding: 60px 10%;
}

.acerca h2 {
  color: #6f1d34;
  margin-bottom: 20px;
}

.descripcion {
  margin-bottom: 40px;
  color: #333;
}

.imagenes-acerca {
  display: flex;
  justify-content: center;
  gap: 40px;
  flex-wrap: wrap;
}

.img-acerca img {
  width: 200px;
  border-radius: 8px;
}

.footer{
    position: relative;
    width: 100%;
    background-color: #8a6d3b;
    min-height: 100px;
    display: flex;
    padding: 20px 50px;
    justify-content: center;
    align-items: center;
  flex-direction: column;

}

.social-icon{
display: flex;
justify-content: center;
align-items: center;
position: relative;
margin: 10px 5px;
flex-wrap: wrap;


}

.icon-elem{
    list-style: none;
}

.icon{
    color: #f9f9f9;
    font-size: 32px;
    display: inline-block;
    margin: 0 10px;
    transition: 0.5s;
}

.icon:hover{
transform: translateY(-10px);
}

.menu{
    display: flex;
    justify-content: center;
    position: relative;
    align-items: center;
    margin: 1px 0;
    flex-wrap: wrap;
}
.menu-elem{
    list-style: none;
}
.menu-icon{
    color: white;
    font-size: 20px;
    display: inline-block;
    text-decoration: none;
    margin: 5px 10px;
    opacity: 0.75;
    transition: 0.3s;
}

.menu-icon:hover{
    opacity: 1;
}

.text{
    color: white;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 10px;
    font-size: 20px;
}

/*cursos disp*/
.cursos-disp {
  background: linear-gradient(180deg, #ffffff 0%, #8d1d3d 100%);
  padding: 50px 20px;
 
  text-align: center;
  position: relative;
  overflow: hidden;
}



.cursos-disp h1 {
  display: inline-block;
  background-color: #b32424;
  color: white;
  padding: 15px 40px;
  border-radius: 10px;
  font-size: 24px;
  margin-bottom: 50px;
  letter-spacing: 1px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}


.grid-cursos {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 50px;
  justify-items: center;
  max-width: 1000px;

  margin-right: 10px;
  margin-left: 250px;
  z-index: 1;
  position: relative;
}


.class {
  background-color: white;
  text-align: center;
  border-radius: 15px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  overflow: hidden;
  height: 350px;
  width: 300px;
}

.class:hover {
  transform: translateY(-10px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

.class img {
  width: 100%;
  height: 160px;
  object-fit: cover;
}

.class p {
  margin: 15px 0;
  font-weight: 600;
  color: #b32424;
  font-size: 16px;
}
  </style>

</head>
<body>
  <!-- Encabezado -->
  <header class="encabezado">
    <div class="logo">
      <img src="images/logo.png" alt="Logo EDAYO">
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
      <img src="images/edayo.jpg" alt="EDAYO Imagen">
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
        <img src="images/cea-logo.png" alt="Curso 1">
        <p>CEA</p>
        <br>
       <p>Reparación de equipos: Diagnóstico y reparación de fallas en dispositivos electrónicos.</p>
      </div>
      
      <div class="curso">
        <img src="images/cem-logo.png" alt="Curso 2">
        <p>CEM</p>
        <br>
       <p>Reparación de equipos: Diagnóstico y reparación de fallas en dispositivos electrónicos.</p>
      </div>
      
      <div class="curso">
        <img src="images/cae-logo.png" alt="Curso 3">
        <p>CAE</p>
        <br>
       <p>Reparación de equipos: Diagnóstico y reparación de fallas en dispositivos electrónicos.</p>
      </div>

      <div class="curso">
        <img src="images/escolarizado-logo.png" alt="Curso 4">
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
      $sql = "SELECT * FROM cursos";
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
