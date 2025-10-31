<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <!-- Cursos CEA -->
  

  <!-- Formulario -->
  <section class="formulario">
    <h2>Formulario de Inscripción</h2>
    <form>
      <div class="fila">
        <div class="campo">
          <label>Nombre Completo</label>
          <input type="text" placeholder="Tu nombre">
        </div>
        <div class="campo">
          <label>Correo Electrónico</label>
          <input type="email" placeholder="nombre123@gmail.com">
        </div>
      </div>

      <div class="fila">
        <div class="campo">
          <label>Teléfono</label>
          <input type="tel" placeholder="+52">
        </div>
        <div class="campo">
          <label>Forma de Pago</label>
          <div class="opciones">
            <label><input type="radio" name="pago"> Transferencia</label>
            <label><input type="radio" name="pago"> Presencial</label>
          </div>
        </div>
      </div>

      <p class="aviso">SI EL PAGO ES POR TRANSFERENCIA:</p>

      <div class="subidas">
        <button type="button" class="boton-subida">
          <ion-icon name="id-card-outline"></ion-icon> Subir INE
        </button>
        <button type="button" class="boton-subida">
          <ion-icon name="receipt-outline"></ion-icon> Subir Comprobante de Pago
        </button>
      </div>

      <button type="submit" class="btn-inscribirse">Inscribirse</button>
    </form>
  </section>
</body>
</html>