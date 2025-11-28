<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CURSOS HTML</title>
  <link rel="stylesheet" href="/CSS/cursos.css">
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

}
/*CURSOS ------------*/
.cursos {
  background: #91192a;
  text-align: center;
  padding: 40px 300px;
}

.cursos h2 {
  margin-bottom: 25px;
  font-size: 30px;
}

.contenedor-cursos {
  display: grid;
  justify-content: center;
    grid-template-columns: repeat(4, 1fr);
  gap: 30px;
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
/*CURSOS ------------*/


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


  nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
 padding: 12px 40px;
 
    }

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

    

/*-----------------------------------------------------------*/
/*-----------------------------------------------------------*/

.modal-container {
  display: none; 
  justify-content: center;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6); 
  z-index: 1000;
}


.modal-container.show {
  display: flex;
}


.modal {
  background-color: #7a1224; 
  width: 500px;
  border-radius: 15px;
  
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  color: #fff;
  text-align: center;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}


.modal-header {
  background-color: #fff;
  padding: 10px 0;
  width: 500px;
  height: 130px;
}

.modal-header img {
  width: 250px;
  height: auto;
  object-fit: contain;
}


.form-content {
  padding: 20px 30px 30px;
}


.modal h2 {
  font-size: 14px;
  margin-bottom: 8px;
  font-weight: bold;
  color: #fff;
  text-align: left;
}

.input-modal {
  position: relative;
  margin-bottom: 25px;
}

.input-modal input {
  width: 100%;
  padding: 14px 15px 14px 55px;
  border: 2px solid #d7a94b;
  border-radius: 30px;
  outline: none;
  background-color: transparent;
  color: white;
  font-size: 14px;
  margin-bottom: 20px;
}

.input-modal input::placeholder {
  color: #d3d3d3;
}

/* === ICONO DE INPUT === */
.input-modal i {
  position: absolute;
  top: 49px;
  left: 0px;
  transform: translateY(-50%);
  background: #fff;
  color: #7a1224;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
}

/* === BOTÓN PRINCIPAL === */
.btn {
  background-color: #b88a4a;
  border: none;
  padding: 10px 30px;
  border-radius: 20px;
  color: white;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
}

.btn:hover {
  background-color: #c79b5e;
}

/* === ENLACES INFERIORES === */
.extra-links {
  margin-top: 15px;
}

.extra-links a {
  display: block;
  color: #ffffff;
  margin-top: 8px;
  font-size: 14px;
  text-decoration: none;
}

.extra-links a:hover {
  text-decoration: underline;
}

#close {
  background-color: transparent;
  border: 2px solid #b88a4a;
  color: #fff;
  border-radius: 20px;
  padding: 8px 20px;
  margin-top: 15px;
  cursor: pointer;
  transition: 0.3s;
}

#close:hover {
  background-color: #b88a4a;
}

      
  </style>

  <!-- Ioncon-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </head>
<body>

  <!--Encabeadp-->
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
  <div class="contenedor-cursos" id="contenedor-cursos"></div>
</section>

<!-- --------- INSCRIOPCIONES --------- -->
<div class="modal-container" id="modal_container">
  <div class="modal">
    <div class="modal-header">
      <img src="images/logo.png" alt="logo">
    </div>
    <div class="form-content">
      <h1 id="cursoSeleccionado">Curso</h1>


     <div class="input-modal">
  <div>
    <h2>Nombre</h2>
    <i class="fa-solid fa-user"></i>
    <input id="nombre" type="text" placeholder="Ingrese su nombre">
  </div>

  <div>
    <h2>Apellido Paterno</h2>
    <i class="fa-solid fa-user-group"></i>
    <input id="apellidoPaterno" type="text" placeholder="Ingrese su apellido paterno">
  </div>

  <div>
    <h2>Apellido Materno</h2>
    <i class="fa-solid fa-user-group"></i>
    <input id="apellidoMaterno" type="text" placeholder="Ingrese su apellido materno">
  </div>

  <div>
    <h2>Correo Electrónico</h2>
    <i class="fa-solid fa-envelope"></i>
    <input id="email" type="email" placeholder="Ingrese su correo">
  </div>

  <div>
    <h2>Número de Teléfono</h2>
    <i class="fa-solid fa-phone"></i>
    <input id="numTelefono" type="text" placeholder="Ingrese su número de teléfono">
  </div>
</div>


      <button class="btn" id="submitInscripcion">Enviar</button>
      <button id="close">Cerrar</button>
    </div>
  </div>
</div>



    <!----------------------------------------------------------------->

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
               

                <script>
document.addEventListener('DOMContentLoaded', () => {
  const contenedor = document.getElementById('contenedor-cursos');
  const modal = document.getElementById('modal_container');
  const closeBtn = document.getElementById('close');
  const cursoTitulo = document.getElementById('cursoSeleccionado');

  // CARGAR CURSOS
  fetch('obtenerCursos.php')
    .then(res => res.json())
    .then(cursos => {
      cursos.forEach(c => {
        const card = document.createElement('div');
        card.className = 'curso';
        card.innerHTML = `
          <img src="images/${c.imagen}" alt="${c.nombre}">
          <h3>${c.nombre}</h3>
          <p>${c.descripcion ?? ''}</p>
          <button class="btn-inscribir" data-curso="${c.nombre}" data-id="${c.id}">Inscribirse</button>
        `;
        contenedor.appendChild(card);
      });

      // Abrir modal al dar clic
      document.querySelectorAll('.btn-inscribir').forEach(btn => {
        btn.addEventListener('click', () => {
          const nombre = btn.dataset.curso;
          const idCurso = btn.dataset.id;

          cursoTitulo.textContent = nombre;
          modal.dataset.cursoId = idCurso;
          modal.classList.add('show');
        });
      });
    });

  // Cerrar modal
  closeBtn.addEventListener('click', () => modal.classList.remove('show'));

  // Enviar inscripcion
  document.getElementById('submitInscripcion').addEventListener('click', () => {
    const nombre = document.getElementById('nombre').value.trim();
    const apellidoPaterno = document.getElementById('apellidoPaterno').value.trim();
    const apellidoMaterno = document.getElementById('apellidoPaterno').value.trim();
    const numTelefono = document.getElementById('numTelefono').value.trim();
    const email = document.getElementById('email').value.trim();
    const idCurso = modal.dataset.cursoId;

    if (!email) {
      alert('Ingresa un correo');
      return;
    }

    fetch('inscribir.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ curso_id: idCurso, nombre, apellidoPaterno, apellidoMaterno, email, numTelefono })
    })
    .then(r => r.json())
    .then(resp => {
      if (resp.success) {
        alert('Inscripción registrada');
        modal.classList.remove('show');
      } else {
        alert('Error: ' + resp.error);
      }
    });
  });
});
</script>

</body>
</html>
