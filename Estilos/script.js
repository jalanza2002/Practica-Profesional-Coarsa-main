const productContainers = document.querySelectorAll('.product-container');  // Selección de contenedores
const nxtBtn = document.querySelectorAll('.nxt-btn');  // Botón siguiente
const preBtn = document.querySelectorAll('.pre-btn');  // Botón previo

productContainers.forEach((item, i) => {
    let containerWidth = item.getBoundingClientRect().width; // Obtener el ancho del contenedor

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;  // Mueve el contenedor hacia la derecha
    });

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;  // Mueve el contenedor hacia la izquierda
    });
});
