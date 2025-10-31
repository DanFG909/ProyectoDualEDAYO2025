<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expo Aprende EDAYO Zinacantepec</title>
    <link rel="stylesheet" href="style.css">
    <!-- Ionicons -->
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
