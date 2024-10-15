// script.js

// Selecciona el contenedor
const timelineContainer = document.querySelector('.timeline-container');

// Hacer que se pueda desplaze
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowRight') {
        timelineContainer.scrollBy({
            top: 0,
            left: 100, // Cantidad de desplazamiento hacia la derecha
            behavior: 'smooth'
        });
    } else if (e.key === 'ArrowLeft') {
        timelineContainer.scrollBy({
            top: 0,
            left: -100, // Cantidad de desplazamiento hacia la izquierda
            behavior: 'smooth'
        });
    }
});
