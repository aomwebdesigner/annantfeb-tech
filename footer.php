<!-- =================================================
                Start of cta section
================================================ -->

<section class="annant-cta-section">
    <div class="container">
        <div class="cta-flex-container">

            <div class="cta-content-part">
                <div class="cta-icon-circle">
                    <i class="bi bi-headset"></i>
                </div>
                <div class="cta-text">
                    <h2>Let's Work Together</h2>
                    <p>Connect with Annant Feb Tech for reliable industrial plant solutions, customized engineering, and dedicated technical support tailored to your requirements.</p>
                </div>
            </div>

            <div class="cta-button-part">
                <a href="contact-us.php" class="btn-cta-white">
                    Contact Us <i class="bi bi-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- =================================================
                End of cta section
================================================ -->

<!-- =================================================
                    Start of footer section
    ================================================ -->

    <footer class="annant-footer">
    <div class="container">
        <div class="row">

            <!-- About -->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="footer-logo">
                    <img src="assets/images/logo/logo.png" alt="Logo" title="Logo">
                </div>

                <p class="opacity-75 fs-6 pe-lg-5 mb-3">
                    Annant Fab Tech has emerged as a trusted name in the field of industrial manufacturing, specializing in the design, fabrication, and supply of high-performance chemical processing plants and storage solutions. With over two decades of industry expertise,
                </p>

                <div class="d-flex gap-3 mt-4">
                </div>
            </div>


            <!-- Company -->
            <div class="col-lg-2 col-md-4 mb-4">
                <h5 class="footer-heading">Company</h5>

                <ul class="footer-links">
                    <li>
                        <a href="home.php">
                            <i class="bi bi-chevron-right small me-2"></i>Home
                        </a>
                    </li>

                    <li>
                        <a href="about-us.php">
                            <i class="bi bi-chevron-right small me-2"></i>About Us
                        </a>
                    </li>

                    <li>
                        <a href="products.php">
                            <i class="bi bi-chevron-right small me-2"></i>Products
                        </a>
                    </li>

                    <li>
                        <a href="contact-us.php">
                            <i class="bi bi-chevron-right small me-2"></i>Contact Us
                        </a>
                    </li>
                </ul>
            </div>


            <!-- Products -->
            <div class="col-lg-3 col-md-4 mb-4">
                <h5 class="footer-heading">Our Products</h5>

                <ul class="footer-links">
                    <li>
                        <a href="copper-sulphate-plant.php">
                            Copper Sulphate Plant
                        </a>
                    </li>

                    <li>
                        <a href="laminate-resin-plant.php">
                            Laminate Resin Plant
                        </a>
                    </li>

                    <li>
                        <a href="manganese-sulphate-plant.php">
                            Manganese Sulphate Plant
                        </a>
                    </li>

                    <li>
                        <a href="magnesium-sulphate-plant.php">
                            Magnesium Sulphate Plant
                        </a>
                    </li>

                    <li>
                        <a href="sodium-bi-sulphate-plant.php">
                            Sodium Bi-Sulphate Plant
                        </a>
                    </li>

                </ul>
            </div>


            <!-- Contact -->
            <div class="col-lg-3 col-md-4 mb-4">
                <h5 class="footer-heading">Quick Contact</h5>

                <div class="footer-contact-box">
                    <i class="bi bi-geo-alt"></i>
                    <span>
                        Plot No 3132/3, Phase 3 Gidc, Chhatral Gidc Estate, Kalol - 382729, Gandhinagar, Gujarat, India
                    </span>
                </div>

                <div class="footer-contact-box">
                    <i class="bi bi-envelope"></i>
                    <span>
                        <a href="mailto:Dipak@annantfabtech.com">
                            Dipak@annantfabtech.com
                        </a>
                    </span>
                </div>

                <div class="footer-contact-box">
                    <i class="bi bi-headset"></i>
                    <span>
                        <a href="tel:+918046075526">
                           +91 8046075526
                        </a>
                    </span>
                </div>

            </div>

        </div>
    </div>


    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-12 text-center">
                    &copy; 2026 <strong>Annant Feb Tech</strong>. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- =================================================
                    End of footer section
    ================================================ -->

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/custom.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const slider = document.querySelector(".product-slider");
    const track = slider.querySelector(".product-slider-track");
    const nextBtn = slider.querySelector(".product-next");
    const prevBtn = slider.querySelector(".product-prev");

    let originalItems = Array.from(
        track.querySelectorAll(".product-slider-item")
    );

    let currentIndex = 0;
    let isMoving = false;
    let autoSlide;

    function getVisibleItems() {
        if (window.innerWidth <= 575) return 1;
        if (window.innerWidth <= 991) return 2;
        return 4;
    }

    function setupClones() {

        // Remove old clones
        track.querySelectorAll(".clone").forEach(item => item.remove());

        const visible = getVisibleItems();

        // Clone first items and put at end
        originalItems.slice(0, visible).forEach(item => {
            const clone = item.cloneNode(true);
            clone.classList.add("clone");
            track.appendChild(clone);
        });

        // Clone last items and put at beginning
        originalItems.slice(-visible).forEach(item => {
            const clone = item.cloneNode(true);
            clone.classList.add("clone");
            track.insertBefore(clone, track.firstChild);
        });

        currentIndex = visible;

        track.style.transition = "none";
        updatePosition();

        // Re-enable animation
        setTimeout(() => {
            track.style.transition = "transform 0.6s ease-in-out";
        }, 50);
    }

    function updatePosition() {

        const item = track.querySelector(".product-slider-item");

        if (!item) return;

        const gap = 24;
        const itemWidth = item.offsetWidth;

        track.style.transform =
            `translateX(-${currentIndex * (itemWidth + gap)}px)`;
    }

    function nextSlide() {

        if (isMoving) return;

        isMoving = true;
        currentIndex++;

        updatePosition();
    }

    function prevSlide() {

        if (isMoving) return;

        isMoving = true;
        currentIndex--;

        updatePosition();
    }

    track.addEventListener("transitionend", function () {

        const visible = getVisibleItems();
        const total = originalItems.length;

        /*
         * End reached:
         * Move silently back to equivalent cloned position
         */
        if (currentIndex >= total + visible) {

            track.style.transition = "none";

            currentIndex = visible;

            updatePosition();

            setTimeout(() => {
                track.style.transition =
                    "transform 0.6s ease-in-out";
            }, 50);
        }

        /*
         * Beginning reached:
         * Move silently to equivalent position
         */
        if (currentIndex < visible) {

            track.style.transition = "none";

            currentIndex = total + visible - 1;

            updatePosition();

            setTimeout(() => {
                track.style.transition =
                    "transform 0.6s ease-in-out";
            }, 50);
        }

        isMoving = false;
    });

    nextBtn.addEventListener("click", function () {
        nextSlide();
        resetAutoplay();
    });

    prevBtn.addEventListener("click", function () {
        prevSlide();
        resetAutoplay();
    });

    function startAutoplay() {

        autoSlide = setInterval(function () {
            nextSlide();
        }, 3500);

    }

    function resetAutoplay() {

        clearInterval(autoSlide);
        startAutoplay();

    }

    window.addEventListener("resize", function () {

        setupClones();

    });

    // Initialize
    setupClones();
    startAutoplay();

});
</script>

</body>

</html>