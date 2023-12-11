document.addEventListener('DOMContentLoaded', function() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const carouselContainer = document.getElementById('carouselImages');
    const cards = carouselContainer.getElementsByClassName('carousel-card');
    const totalCards = cards.length;
    const visibleCards = 4;

    let startIndex = 0;
    let isPaused = false;
    let timerId;

    prevBtn.addEventListener('click', function() {
        startIndex = (startIndex - 1 + totalCards) % totalCards;
        updateVisibleCards();
    });

    nextBtn.addEventListener('click', function() {
        startIndex = (startIndex + 1) % totalCards;
        updateVisibleCards();
    });

    function updateVisibleCards() {
        for (let i = 0; i < totalCards; i++) {
            const cardIndex = (startIndex + i) % totalCards;
            cards[cardIndex].style.display = (i < visibleCards) ? 'flex' : 'none';
        }
    }

    function startAutoScroll() {
        timerId = setInterval(function() {
            if (!isPaused) {
                startIndex = (startIndex + 1) % totalCards;
                updateVisibleCards();
            }
        }, 5000);
    }

    function pauseAutoScroll() {
        clearInterval(timerId);
    }

    carouselContainer.addEventListener('mouseenter', function() {
        isPaused = true;
        pauseAutoScroll();
    });

    carouselContainer.addEventListener('mouseleave', function() {
        isPaused = false;
        startAutoScroll();
    });

    startAutoScroll();
    updateVisibleCards();
});
