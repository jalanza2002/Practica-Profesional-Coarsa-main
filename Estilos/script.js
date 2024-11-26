window.onload = function() {
    const productContainer = document.querySelector('.product-container');
    const items = productContainer.querySelectorAll('.product-card');
    const totalItems = items.length;

    // Clonamos los elementos para que haya suficientes para que el bucle sea continuo
    for (let i = 0; i < totalItems; i++) {
        const cloneItem = items[i].cloneNode(true);
        productContainer.appendChild(cloneItem);
    }
};
