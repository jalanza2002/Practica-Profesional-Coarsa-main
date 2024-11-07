// Obtener los elementos
const hamburger = document.getElementById('hamburger-btn');
const navbar = document.querySelector('.navbar');

// Agregar un evento para abrir y cerrar el menú
hamburger.addEventListener('click', () => {
  navbar.classList.toggle('active'); // Agrega o quita la clase 'active' al hacer clic
});