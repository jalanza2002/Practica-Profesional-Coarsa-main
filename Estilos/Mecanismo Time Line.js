document.addEventListener('DOMContentLoaded', () => {
  const timeline = document.querySelector('.timeline');
  
  // Duplicar los elementos para simular el bucle infinito
  timeline.innerHTML += timeline.innerHTML;

  // Variables de control
  let isScrolling = false;

  // Detectar cuando el usuario llega al final y resetear
  timeline.addEventListener('scroll', () => {
    const maxScrollLeft = timeline.scrollWidth / 2; // Mitad del contenido duplicado
    if (timeline.scrollLeft >= maxScrollLeft) {
      timeline.scrollLeft = 0; // Reinicia al inicio
    } else if (timeline.scrollLeft === 0) {
      timeline.scrollLeft = maxScrollLeft; // Reinicia al final
    }
    isScrolling = true;
  });

  // Desplazamiento automático si el usuario no interactúa
  const autoScroll = () => {
    if (!isScrolling) {
      timeline.scrollLeft += 1; // Ajusta la velocidad
    }
    isScrolling = false;
    requestAnimationFrame(autoScroll);
  };

  autoScroll();
});


