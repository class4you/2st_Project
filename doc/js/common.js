let currentSlide = 1;

    function changeSlide(n) {
        showSlide(currentSlide += n);
    }

    function showSlide(n) {
        let slides = document.querySelectorAll('.carousel-inner .item');
        
        if (n > slides.length) {
            currentSlide = 1;
        }

        if (n < 1) {
            currentSlide = slides.length;
        }

        for (let i = 0; i < slides.length; i++) {
            slides[i].classList.remove('active');
        }

        slides[currentSlide - 1].classList.add('active');
    }

    