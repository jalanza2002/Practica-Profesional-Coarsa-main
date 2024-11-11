const productContainers = document.querySelectorAll('.timeline');  // Selección de contenedores
const nxtBtn = document.querySelectorAll('.next-btn');  // Botón siguiente
const preBtn = document.querySelectorAll('.prev-btn');  // Botón previo

productContainers.forEach((item, i) => {
    let containerWidth = item.getBoundingClientRect().width; // Obtener el ancho del contenedor

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;  // Mueve el contenedor hacia la derecha
    });

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;  // Mueve el contenedor hacia la izquierda
    });
});
