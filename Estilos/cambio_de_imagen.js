const banner = document.querySelector('.banner');

// Lista de imágenes para el carrusel
const images = [
  '/Estilos/images/menu.jpg',
  '/Estilos/images/menu-2.jpeg',
];

let currentIndex = 0;

function changeBackground() {
  // Actualiza la imagen actual
  const nextIndex = (currentIndex + 1) % images.length;

  // Actualiza la imagen del banner con desvanecimiento suave
  banner.style.backgroundImage = `
    linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)),
    url(${images[nextIndex]})`;

  // Actualiza el índice
  currentIndex = nextIndex;
}

// Cambia de fondo cada 5 segundos con un desvanecimiento de 2 segundos
setInterval(changeBackground, 5000);
