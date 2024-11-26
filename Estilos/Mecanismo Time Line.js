window.onload = function () {
    const timeline = document.querySelector('.timeline');
    const items = timeline.querySelectorAll('.timeline-item');
    
    const totalItems = items.length;
    
    // Clonar todos los ítems y agregarlos al final para que el movimiento sea continuo
    for (let i = 0; i < totalItems; i++) {
      const cloneItem = items[i].cloneNode(true);
      timeline.appendChild(cloneItem);
    }
  };