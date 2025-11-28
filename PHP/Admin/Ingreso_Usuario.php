<!DOCTYPE html>
<html>
<head>
  <title>Buscar Nombre</title>
   <link rel="stylesheet" href="../../CSS/styleingreso.css">
</head>
<body>
  <div class="Ingreso">
  Ingrese su codigo de usuario<br><input type="text" id="idInput" placeholder="Ingresar"><br>
  <button onclick="buscarNombre()">Verificar</button>
  <br><br>
  <label id="nombreLabel">Nombre: </label>
  <br><br>
  <button id="btnIngresar" style="display:none;">Ingresar</button>
  </div>
  <script>
    document.getElementById("btnIngresar").addEventListener("click", function() {
      const id = document.getElementById("idInput").value;
      if (this.dataset.valid === "true") {
        window.location.href = "VistaMain.php";
      }
    });

    function buscarNombre() {
      const id = document.getElementById("idInput").value.trim();

      // Evita consultas vacías
      if (id === "") {
        document.getElementById("nombreLabel").textContent = "Por favor ingresa un ID.";
        document.getElementById("btnIngresar").style.display = "none";
        return;
      }

      fetch("BuscarNombre.php?Codigo_Usuario=" + encodeURIComponent(id))
        .then(response => response.text())
        .then(nombre => {
          const label = document.getElementById("nombreLabel");
          const btn = document.getElementById("btnIngresar");

          if (nombre === "NO_ENCONTRADO") {
            label.textContent = "Codigo de usuario no encontrado.";
            btn.style.display = "none";
            btn.dataset.valid = "false";
          } else {
            label.textContent = "Nombre: " + nombre;
            btn.style.display = "inline-block";
            btn.dataset.valid = "true"; // Marca el botón como válido
          }
        })
        .catch(error => {
          console.error("Error:", error);
        });
    }
  </script>
</body>
</html>