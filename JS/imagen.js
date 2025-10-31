
function cargarImagen() {
    const idInput = document.getElementById('id_curso').value;
    const imagen = document.getElementById('imagenCurso');

    // Si no hay id, ponemos un id que sabemos no existe para que muestre imagen por defecto
    const id = idInput ? idInput : 0;

    // Actualizamos la URL de la imagen para que el navegador cargue la nueva imagen
    imagen.src = 'ver_imagen.php?id=' + id + '&t=' + new Date().getTime();
    // El parámetro t con timestamp evita que el navegador use imagen en caché
}

