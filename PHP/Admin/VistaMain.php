<!--después voy a implementar un sistema de sesiones aquí-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventana Principal | Administrativa</title>
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
                    window.parent.cerrarContenedor('contenedor')
                    fetch('Interesados.php')
                    .then(response => response.text())
                    .then(html => {
                    document.getElementById('contenedor').innerHTML = html;
                    }
                   );
                 }
            </script>
             <button onclick="mostrarPagina2()">Interesados</button>

            <div id="contenedor2" style="margin-top:20px;"></div>
        </div>
        <br><br>

        <div>
            <script>
                function mostrarPagina() {
                    window.parent.cerrarContenedor('contenedor')
                    fetch('Inscripciones.php')
                    .then(response => response.text())
                    .then(html => {
                    document.getElementById('contenedor').innerHTML = html;
                    document.getElementById('contenedor').innerHTML = html;
                    }
                   );
                 }
            </script>
             <button onclick="mostrarPagina()">Inscripciones</button>

        </div>

        <br><br>

        <div>
            <script> 
                function mostrarPagina3() {
                    window.parent.cerrarContenedor('contenedor')
                    fetch('Usuarios.php')
                    .then(response => response.text())
                    .then(html => {
                    document.getElementById('contenedor3').innerHTML = html;
                    }
                   );
                 }
            </script>
             <button onclick="mostrarPagina3()">Usuarios</button>

            <div id="contenedor3" style="margin-top:20px;"></div>
        </div>
        <br>


        <div>
            <script>
                function mostrarPagina4() {
                    window.parent.cerrarContenedor('contenedor')
                    fetch('Cursos.php')
                    .then(response => response.text())
                    .then(html => {
                    document.getElementById('contenedor').innerHTML = html;
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

        <a href="cerrar_sesion">
            Cerrar Sesion
        </a>
        
        <br><br>
        
        <a href="Perfiles.php">
            Perfiles
        </a>
    </section>

    <aside>
        <div id="contenedor"></div>
        
      
    </aside>
    


</body>
</html>