<!--después voy a implementar un sistema de sesiones aquí-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventana Princiál | Administrativa</title>
    <link rel="stylesheet" href="../../CSS/VistaMain.css">
    <script>
        function cerrarContenedor(id) {
        document.getElementById(id).innerHTML = '';
        }
</script>

</head>
<body>

    <div id="arriba">
        <header>
            <img src="../../Images/expoaprende.png" alt="">
        </header>
    </div>
 
    <section id="menu">


        <H3>Bienvenido Usuario</H3>
        <img src="../../Images/Perfilprovisional.png" alt="" class="Perfil">
        <br><br>



        <a href="index.php">
            Inicio
        </a>
        
        <br><br>

        <div>
            <script>
                function mostrarPagina2() {
                    fetch('Interesados.php')
                    .then(response => response.text())
                    .then(html => {
                    document.getElementById('contenedor1').innerHTML = html;
                    }
                   );
                 }
            </script>
             <button onclick="mostrarPagina2()" class="botones">Interesados</button>
       </div>
        <br>

        <div>
            
            <script>
                function mostrarPagina() {
                    fetch('Inscripciones.php')
                    .then(response => response.text())
                    .then(html => {
                    document.getElementById('contenedor2').innerHTML = html;
                    }
                   );
                 }
            </script>
             <button onclick="mostrarPagina()" class="botones">Inscripciones</button>

             <div id="contenedor2"></div>
           <!--
                -->
        </div>

        <br>

        <div>
            <script>
                function mostrarPagina3() {
                    fetch('Usuarios.php')
                    .then(response => response.text())
                    .then(html => {
                    document.getElementById('contenedor').innerHTML = html;
                    }
                   );
                 }
            </script>
             <button onclick="mostrarPagina3()" class="botones">Usuarios</button>
           
        </div>
        <br><br>


        <div>
            <script>
                function mostrarPagina4() {
                    fetch('Cursos.php')
                    .then(response => response.text())
                    .then(html => {
                    document.getElementById('contenedor4').innerHTML = html;
                    }
                   );
                 }
            </script>
             <button onclick="mostrarPagina4()" class="botones">Cursos</button>
            <div id="contenedor4"></div>
            </div>
        
        <br>
        <button class="botones"><a href="Contacto.php">
                Contacto
        </a></button>

        <br><br>
        <button class="botones"><a href="cerrar_sesion">
                Cerrar Sesion
        </a></button>
        
        <br><br>
        <button class="botones"><a href="Perfiles.php">
            Perfiles
            </a>
        </button>
    </section>

    <aside>
        <div id="contenedor"></div>
        
      
    </aside>
    


</body>
</html>