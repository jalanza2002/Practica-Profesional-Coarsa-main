const carousel = document.querySelectorAll('.timeline'); 
const nextBtn = document.querySelectorAll('.nxt-btn'); 
const prevsBtn = document.querySelectorAll('.pre-btn'); 

carousel.forEach((item, i) => {
    let containerWidth = item.getBoundingClientRect().width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
        if (item.scrollLeft + containerWidth >= item.scrollWidth) {
            item.scrollLeft = item.scrollWidth; // Ajusta al final exacto
        }
    });

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
        if (item.scrollLeft - containerWidth <= 0) {
            item.scrollLeft = 0; // Ajusta al inicio exacto
        }
    });
});
