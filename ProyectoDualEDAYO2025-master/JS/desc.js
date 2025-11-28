function mostrarEspecificaciones() {
    const curso = document.getElementById("curso").value;
    const div = document.getElementById("especificaciones");

const dataCursos = {
    "Asistente ejecutivo": {
        descripcion: "Aprende técnicas administrativas, manejo de agenda, atención telefónica y redacción de documentos.",
        materiales: "Cuaderno, bolígrafos, computadora (opcional).",
        dias: "Lunes y Miércoles"
    },
    "Carpinteria": {
        descripcion: "Técnicas básicas de carpintería, uso de herramientas y armado de muebles.",
        materiales: "Guantes, gafas de protección, cinta métrica, madera.",
        dias: "Martes y Jueves"
    },
    "Creacion y confeccion de prendas": {
        descripcion: "Aprende a diseñar, cortar y confeccionar prendas de vestir utilizando técnicas básicas de costura y patronaje.",
        materiales: "Máquina de coser (opcional), tela de práctica, hilo, tijeras, cinta métrica, alfileres, lápiz para marcar tela.",
        dias: "Martes y Viernes"
    },
    "Electricidad": {
        descripcion: "Curso básico de instalaciones eléctricas residenciales y seguridad eléctrica.",
        materiales: "Pinzas, desarmadores, guantes aislantes.",
        dias: "Lunes, Miércoles y Viernes"
    },
    "Estilismo y diseño de imagen": {
        descripcion: "Aprende técnicas de estilismo personal, maquillaje y asesoría de imagen.",
        materiales: "Kit de maquillaje básico, espejo, peines, tijeras.",
        dias: "Miércoles y Sábados"
    },
    "Fotografia": {
        descripcion: "Técnicas básicas de fotografía, manejo de cámaras y edición digital.",
        materiales: "Cámara digital o smartphone, computadora con software de edición.",
        dias: "Viernes y Sábados"
    },
    "Gastronomia": {
        descripcion: "Aprende cocina nacional e internacional, técnicas culinarias y presentación de platos.",
        materiales: "Mandil, cuchillo, tabla para picar, ingredientes semanales.",
        dias: "Sábados"
    },
    "Hojalateria y pintura": {
        descripcion: "Técnicas de reparación y pintura de carrocerías automotrices.",
        materiales: "Lijadora, compresor, pinturas, mascarilla de protección.",
        dias: "Martes y Jueves"
    },
    "Ingles": {
        descripcion: "Curso de inglés desde nivel básico hasta intermedio, enfocado en comunicación oral y escrita.",
        materiales: "Cuaderno, diccionario, audífonos (opcional).",
        dias: "Martes y Jueves"
    },
    "Mecanica automotriz": {
        descripcion: "Fundamentos de mecánica automotriz, diagnóstico y mantenimiento básico.",
        materiales: "Guantes, herramientas básicas de mecánica.",
        dias: "Lunes, Miércoles y Viernes"
    },
    //Para mas cursos si es necesario
};



    // Si no selecciono nada se limpi
    if (!curso || !dataCursos[curso]) {
        div.innerHTML = "";
        return;
    }

    const info = dataCursos[curso];

    div.innerHTML = `
        <div class="info-curso">
            <h3>Información del curso: ${curso}</h3>
            <p><strong>Descripción:</strong> ${info.descripcion}</p>
            <p><strong>Materiales requeridos:</strong> ${info.materiales}</p>
            <p><strong>Días disponibles:</strong> ${info.dias}</p>
        </div>
    `;
}
