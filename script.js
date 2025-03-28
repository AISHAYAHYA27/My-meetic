document.addEventListener("DOMContentLoaded", function() {
    const carousel = document.querySelector(".carousel");
    const prevButton = document.querySelector(".prev");
    const nextButton = document.querySelector(".next");
    let index = 0;

   
    const itemsVisible = 3; 

    const itemWidth = document.querySelector(".carousel-item").offsetWidth;
    const carouselWidth = itemWidth * itemsVisible;

    nextButton.addEventListener("click", () => {
        if (index < carousel.children.length - itemsVisible) {
            index++;
            carousel.style.transform = `translateX(-${index * itemWidth}px)`;
        }
    });

 
    prevButton.addEventListener("click", () => {
        if (index > 0) {
            index--;
            carousel.style.transform = `translateX(-${index * itemWidth}px)`;
        }
    });
});