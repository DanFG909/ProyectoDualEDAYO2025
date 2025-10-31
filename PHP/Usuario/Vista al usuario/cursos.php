<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filtración de Cursos - CEA</title>
  <link rel="stylesheet" href="inscripcion.css">
  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
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

body {
  background: #f4f4f4;
  color: white;
}

/* NAVBAR */
.navbar {
  background: #7a1522;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 30px;
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
  color: #611b2e;
  font-weight: 600;
  text-decoration: none;
  margin-left: 1360px;
}

/* CURSOS */
.cursos {
  background: #91192a;
  text-align: center;
  padding: 80px 500px;
}

.cursos h2 {
  margin-bottom: 25px;
  font-size: 30px;
}

.contenedor-cursos {
  display: grid;
  justify-content: center;
    grid-template-columns: repeat(4, 1fr);
  gap: 10px;

  margin-top: 0%;
  flex-wrap: wrap;
}

.curso {
  background: #7a1522;
  border-radius: 10px;
  overflow: hidden;
  width: 200px;
  text-align: center;
  padding-bottom: 20px;
}

.curso img {
  width: 200px;
    height: 200px;
    object-fit: cover;  
    display: block;
    margin: 0 auto; 
}

.curso h3 {
  margin: 10px 0;
  font-size: 18px;
}

.curso button {
  background: #d4a85d;
  border: none;
  padding: 8px 20px;
  border-radius: 6px;
  cursor: pointer;
  color: #7a1522;
  font-weight: 600;
  transition: 0.3s;
}


.curso button:hover {
  background: #ffb84d;
}

/* FORMULARIO */
.formulario {
  background: #7a1522;
  padding: 40px 20px;
  text-align: center;
}

.formulario h2 {
  margin-bottom: 20px;
  font-size: 24px;
}

form {
  max-width: 600px;
  margin: auto;
}

.fila {
  display: flex;
  justify-content: space-between;
  gap: 15px;
  margin-bottom: 15px;
  flex-wrap: wrap;
}

.campo {
  flex: 1;
  min-width: 250px;
  text-align: left;
}

label {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}

input {
  width: 100%;
  padding: 8px;
  border-radius: 6px;
  border: none;
  background: #f8f8f8;
  color: #333;
}

.opciones {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.aviso {
  color: #ffb84d;
  font-weight: bold;
  margin-top: 15px;
}

.subidas {
  display: flex;
  justify-content: center;
  gap: 15px;
  margin: 20px 0;
  flex-wrap: wrap;
}

.boton-subida {
  background: #d4a85d;
  border: none;
  padding: 10px 15px;
  border-radius: 6px;
  color: #7a1522;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 6px;
  transition: 0.3s;
}

.boton-subida ion-icon {
  font-size: 18px;
}

.boton-subida:hover {
  background: #ffcc70;
}

.btn-inscribirse {
  background: #d4a85d;
  color: #7a1522;
  border: none;
  padding: 10px 25px;
  border-radius: 6px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.3s;
}

.btn-inscribirse:hover {
  background: #ffb84d;
}

/* FOOTER */
.contacto {
  background: #91192a;
  text-align: center;
  padding: 20px;
}

.redes {
  margin-top: 10px;
}

.redes ion-icon {
  font-size: 25px;
  margin: 0 8px;
  cursor: pointer;
  transition: 0.3s;
}

.redes ion-icon:hover {
  color: #ffb3b3;
}

/* RESPONSIVO */
@media (max-width: 768px) {
  .fila {
    flex-direction: column;
  }

  .contenedor-cursos {
    flex-direction: column;
    align-items: center;
  }

  .curso {
    width: 80%;
  }
}
  nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
 
      padding: 12px 400px;
 
    }

    /* LINKS DEL MENÚ */
    nav a {
      color: rgb(0, 0, 0);
      text-decoration: none;
      margin: 0 18px;
      font-weight: 500;
      transition: color 0.3s ease, transform 0.2s ease;
      font-size: 25px;
    }

    nav a:hover {
      transform: scale(1.1);
    }

    /* PERFIL (foto + nombre) */
    .perfil {
      display: flex;
      align-items: center;
      background: white;
      padding: 6px 12px;
      border-radius: 50px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      gap: 10px;
    }

    .perfil img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }

    .perfil span {
      font-weight: 600;
      color: #333;
      font-size: 15px;
    }

    /* PARA ORDENAR NAV Y PERFIL */
    .navbar-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
    }
  </style>
  <!-- Ioncon-->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>

  
  <header class="encabezado">
    <div class="logo">
      <img src="images/logo.png" alt="Logo EDAYO">
      <div class="texto">
        <h2>EXPOAPRENDE</h2>
        <p>EDAYO ZINACANTEPEC</p>
      </div>
    </div>
   
     <nav>
      <a href="#">Inicio</a>
      <a href="#">Cursos</a>
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
      <div class="curso">
        <img src="images/carpinteria.jpeg" alt="Carpintería">
        <h3>Carpintería</h3>
        <button>Inscribirse</button>
      </div>

      <div class="curso">
        <img src="images/electricidad.jpeg" alt="Electricidad">
        <h3>Electricidad</h3>
        <button>Inscribirse</button>
      </div>

      <div class="curso">
        <img src="images/fotografia.jpeg" alt="Electricidad">
        <h3>Fotografia</h3>
        <button>Inscribirse</button>
      </div>

      <div class="curso">
        <img src="images/electronica.jpeg" alt="Electricidad">
        <h3>Electronica</h3>
        <button>Inscribirse</button>
      </div>

      <div class="curso">
        <img src="images/serigrafia.jpeg" alt="Electricidad">
        <h3>Serigrafía</h3>
        <button>Inscribirse</button>
      </div>

      <div class="curso">
        <img src="images/gastronomia.jpeg" alt="Electricidad">
        <h3>Gastronomía</h3>
        <button>Inscribirse</button>
      </div>

      <div class="curso">
        <img src="images/prendas.jpg" alt="Electricidad">
        <h3>Prendas</h3>
        <button>Inscribirse</button>
      </div>

      <div class="curso">
        <img src="images/ingles.jpg" alt="Electricidad">
        <h3>Inglés</h3>
        <button>Inscribirse</button>
      </div>

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
