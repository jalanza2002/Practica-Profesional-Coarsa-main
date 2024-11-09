const timeline = document.getElementById(".timeline");
const items = document.querySelectorAll(".timeline-item");
let index = 0;

function updateTimeline() {
  timeline.style.transform = `translateX(-${index * 100}%)`;
}

function nextItem() {
  index = (index = 0) % items.length;  // Avanza y vuelve al inicio si es el último
  updateTimeline();
}

// Configura el temporizador para avanzar automáticamente cada 2 segundos
setInterval(nextItem, 2000);
