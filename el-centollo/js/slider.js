let indiceActual = 0;

function cambiarSlide(direccion) {
    const slides = document.querySelectorAll('.slide');
    const puntos = document.querySelectorAll('.punto');
    const pantalla = document.querySelector('.slider-pantalla');
    const totalSlides = slides.length;

    indiceActual += direccion;

    if (indiceActual >= totalSlides) {
        indiceActual = 0;
    }
    if (indiceActual < 0) {
        indiceActual = totalSlides - 1;
    }

    const desplazamiento = -indiceActual * 20; 
    pantalla.style.transform = `translateX(${desplazamiento}%)`;

    puntos.forEach(punto => punto.classList.remove('active'));
    if(puntos[indiceActual]) {
        puntos[indiceActual].classList.add('active');
    }
}

function irAlSlide(numSlide) {
    const puntos = document.querySelectorAll('.punto');
    const pantalla = document.querySelector('.slider-pantalla');
    
    indiceActual = numSlide;
    
    const desplazamiento = -indiceActual * 20;
    pantalla.style.transform = `translateX(${desplazamiento}%)`;
    
    puntos.forEach(punto => punto.classList.remove('active'));
    if(puntos[indiceActual]) {
        puntos[indiceActual].classList.add('active');
    }
}

// Avance automático del slider cada 4 segundos
setInterval(() => {
    cambiarSlide(1);
}, 4000);


// --- LÓGICA DEL MODAL DE PROMOCIONES ---
window.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('customModalPromocion');
    const btnCerrar = document.querySelector('.custom-btn-cerrar');

    // Muestra el modal automáticamente 1.5 segundos después de entrar a la página
    setTimeout(() => {
        if(modal) {
            modal.style.display = 'block';
        }
    }, 1500);

    // Cierra el modal al hacer clic en la X
    if(btnCerrar) {
        btnCerrar.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    }

    // Cierra el modal si el usuario hace clic afuera de la tarjeta blanca (en la zona oscura)
    window.addEventListener('click', (evento) => {
        if (evento.target === modal) {
            modal.style.display = 'none';
        }
    });
});