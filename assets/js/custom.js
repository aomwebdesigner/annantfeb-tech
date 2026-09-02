document.addEventListener("DOMContentLoaded", function () {
    const currentPage = window.location.pathname.split("/").pop() || "index.php";

    document.querySelectorAll(".navbar-nav .nav-link").forEach(link => {
        const linkPage = link.getAttribute("href");

        if (linkPage === currentPage) {
            link.classList.add("active");
        } else {
            link.classList.remove("active");
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {

    const slides = document.querySelectorAll(".annant-slide");
    const nextBtn = document.querySelector(".annant-next");
    const prevBtn = document.querySelector(".annant-prev");

    let currentSlide = 0;
    let autoPlay;

    function showSlide(index) {

        slides[currentSlide].classList.remove("active");

        currentSlide = (index + slides.length) % slides.length;

        slides[currentSlide].classList.add("active");
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    function previousSlide() {
        showSlide(currentSlide - 1);
    }

    nextBtn.addEventListener("click", function () {

        nextSlide();

        restartAutoPlay();

    });

    prevBtn.addEventListener("click", function () {

        previousSlide();

        restartAutoPlay();

    });

    function startAutoPlay() {

        autoPlay = setInterval(function () {

            nextSlide();

        }, 5000);

    }

    function restartAutoPlay() {

        clearInterval(autoPlay);

        startAutoPlay();

    }

    startAutoPlay();

});


document.addEventListener("DOMContentLoaded", function () {

    const track = document.querySelector(".testimonial-slider-track");
    const items = document.querySelectorAll(".testimonial-slider-item");
    const prevBtn = document.querySelector(".testimonial-prev");
    const nextBtn = document.querySelector(".testimonial-next");

    if (!track || !items.length) return;

    let currentIndex = 0;

    function getItemsPerView() {
        if (window.innerWidth <= 575) {
            return 1;
        }

        if (window.innerWidth <= 991) {
            return 2;
        }

        return 3;
    }

    function updateSlider() {

        const itemsPerView = getItemsPerView();
        const gap = 24;

        const itemWidth = items[0].offsetWidth + gap;

        const maxIndex = Math.max(
            0,
            items.length - itemsPerView
        );

        if (currentIndex > maxIndex) {
            currentIndex = maxIndex;
        }

        track.style.transform =
            `translateX(-${currentIndex * itemWidth}px)`;
    }

    nextBtn.addEventListener("click", function () {

        const itemsPerView = getItemsPerView();
        const maxIndex = Math.max(
            0,
            items.length - itemsPerView
        );

        if (currentIndex < maxIndex) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }

        updateSlider();
    });

    prevBtn.addEventListener("click", function () {

        const itemsPerView = getItemsPerView();
        const maxIndex = Math.max(
            0,
            items.length - itemsPerView
        );

        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = maxIndex;
        }

        updateSlider();
    });

    window.addEventListener("resize", updateSlider);

    updateSlider();

});


document.addEventListener('DOMContentLoaded', function () {

    const slides = document.querySelectorAll('.product-slide');
    const prevButton = document.getElementById('productPrev');
    const nextButton = document.getElementById('productNext');

    let currentSlide = 0;
    let autoSlide;

    function showSlide(index) {

        slides.forEach(function (slide) {
            slide.classList.remove('active');
        });

        slides[index].classList.add('active');

    }

    function nextSlide() {

        currentSlide++;

        if (currentSlide >= slides.length) {
            currentSlide = 0;
        }

        showSlide(currentSlide);

    }

    function previousSlide() {

        currentSlide--;

        if (currentSlide < 0) {
            currentSlide = slides.length - 1;
        }

        showSlide(currentSlide);

    }

    function startAutoSlide() {

        clearInterval(autoSlide);

        autoSlide = setInterval(function () {
            nextSlide();
        }, 5000);

    }

    if (slides.length > 1) {

        nextButton.addEventListener('click', function () {
            nextSlide();
            startAutoSlide();
        });

        prevButton.addEventListener('click', function () {
            previousSlide();
            startAutoSlide();
        });

        startAutoSlide();

    }


    const enquiryOverlay = document.getElementById('productEnquiry');
    const openButtons = document.querySelectorAll('.open-enquiry');
    const closeButton = document.getElementById('closeEnquiry');

    openButtons.forEach(function (button) {

        button.addEventListener('click', function () {

            enquiryOverlay.classList.add('show');

            document.body.style.overflow = 'hidden';

        });

    });


    function closeEnquiry() {

        enquiryOverlay.classList.remove('show');

        document.body.style.overflow = '';

    }


    closeButton.addEventListener('click', closeEnquiry);


    enquiryOverlay.addEventListener('click', function (event) {

        if (event.target === enquiryOverlay) {
            closeEnquiry();
        }

    });


    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {
            closeEnquiry();
        }

    });

});
