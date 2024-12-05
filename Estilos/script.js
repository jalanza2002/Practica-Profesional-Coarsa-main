const imageRow = document.getElementById('imageRow');
const prevButton = document.getElementById('prevButton');
const nextButton = document.getElementById('nextButton');

let position = 0;
const circleWidth = 120; // Ancho de cada círculo con margen incluido
const totalCircles = imageRow.children.length;

// Función para mover el carrusel
function moveCarousel(direction) {
  position += direction * circleWidth;

  // Verificar si estamos en los duplicados y ajustar la posición
  if (direction === 1 && position <= -(circleWidth * (totalCircles - 2))) {
    position = -circleWidth * 2; // Ajustar al inicio sin duplicados
  } else if (direction === -1 && position >= circleWidth * 2) {
    position = -circleWidth * (totalCircles - 4); // Ajustar al final sin duplicados
  }

  imageRow.style.transition = 'transform 0.5s ease';
  imageRow.style.transform = `translateX(${position}px)`;
}

// Ajustar sin transición al detectar duplicados
imageRow.addEventListener('transitionend', () => {
  if (position <= -(circleWidth * (totalCircles - 2))) {
    position = -circleWidth * 2;
    imageRow.style.transition = 'none';
    imageRow.style.transform = `translateX(${position}px)`;
  } else if (position >= circleWidth * 2) {
    position = -circleWidth * (totalCircles - 4);
    imageRow.style.transition = 'none';
    imageRow.style.transform = `translateX(${position}px)`;
  }
});

// Agregar eventos a los botones
prevButton.addEventListener('click', () => moveCarousel(-1));
nextButton.addEventListener('click', () => moveCarousel(1));