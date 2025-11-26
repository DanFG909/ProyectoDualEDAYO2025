// Modal de inscripción
document.querySelectorAll(".openModal").forEach(btn => {
    btn.addEventListener("click", () => {
        document.getElementById("myModal").style.display = "block";
    });
});

// Cerrar inscripción
document.addEventListener("click", (e) => {
    if (e.target.classList.contains("close")) {
        document.getElementById("myModal").style.display = "none";
    }
});

window.addEventListener("click", (e) => {
    if (e.target.id === "myModal") {
        document.getElementById("myModal").style.display = "none";
    }
});


// ⭐ MODAL LOGIN ⭐
document.querySelectorAll(".openLogin").forEach(btn => {
    btn.addEventListener("click", () => {
        document.getElementById("loginModal").style.display = "block";
    });
});

document.addEventListener("click", (e) => {
    if (e.target.classList.contains("closeLogin")) {
        document.getElementById("loginModal").style.display = "none";
    }
});

window.addEventListener("click", (e) => {
    if (e.target.id === "loginModal") {
        document.getElementById("loginModal").style.display = "none";
    }
});
