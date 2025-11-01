<section class="section-lg bg-neutral-100">
    <div class="max-w-7xl mx-auto">
        <!-- Heading -->
        <div class="text-center mb-16">
            <h2 class="heading-1 mb-6" style="background: linear-gradient(180deg, #2D6BB4 0%, #2F68B1 28%, #355FA7 49%, #415097 68%, #513B81 85%, #652266 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Inside The Lab</h2>
            <p class="sub-heading-2 mx-auto leading-relaxed">
                Our lab isn't just a facility—it's a partner in your project's success.<br>
                Whether you're in construction, geotech, or infrastructure, reliable results mean smarter decisions.
            </p>
        </div>

        <!-- Mock Card Data -->
        @php
            $labCards = [
                [
                    'id' => 1,
                    'title' => 'Modern Architecture',
                    'image' => 'images/lab-building-1.jpg',
                    'description' => 'State-of-the-art facility design'
                ],
                [
                    'id' => 2,
                    'title' => 'Advanced Laboratory',
                    'image' => 'images/lab-building-2.jpg',
                    'description' => 'Cutting-edge testing equipment'
                ],
                [
                    'id' => 3,
                    'title' => '3 Engineering',
                    'image' => 'images/lab-building-3.jpg',
                    'description' => 'Expert analysis and quality control'
                ],
                [
                    'id' => 4,
                    'title' => '4 Engineering',
                    'image' => 'images/lab-building-3.jpg',
                    'description' => 'Expert analysis and quality control'
                ],
                [
                    'id' => 5,
                    'title' => '5 Engineering',
                    'image' => 'images/lab-building-3.jpg',
                    'description' => 'Expert analysis and quality control'
                ],
            ];
        @endphp

        <!-- Center-Focused Carousel -->
        <div class="relative w-full">
            <!-- Carousel Container -->
            <div class="carousel-container relative overflow-hidden py-12">
                <!-- Carousel Track -->
                <div id="carousel-track" class="carousel-track flex items-center justify-center">
                    @foreach($labCards as $index => $card)
                        <div class="carousel-item" data-index="{{ $index }}">
                            <div
                                class="carousel-card rounded-3xl overflow-hidden shadow-xl bg-white border border-neutral-300">
                                <img src="{{ asset($card['image']) }}" alt="{{ $card['title'] }}"
                                    class="w-full h-full object-cover" title="{{ $card['description'] }}" style="max-width: 756px;">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Navigation Buttons -->
            <button id="prev-btn" class="carousel-nav carousel-nav-prev" aria-label="Previous slide">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button id="next-btn" class="carousel-nav carousel-nav-next" aria-label="Next slide">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <style>
            /* Carousel Container */
            .carousel-container {
                position: relative;
                height: 600px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Carousel Track */
            .carousel-track {
                position: relative;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 2rem;
            }

            /* Carousel Item */
            .carousel-item {
                position: absolute;
                transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
                will-change: transform, opacity;
            }

            /* Carousel Card */
            .carousel-card {
                width: 427px;
                height: 533px;
                transition: inherit;
            }

            /* Center Item (Active) */
            .carousel-item[data-position="center"] {
                z-index: 30;
                transform: translateX(0) scale(1);
                opacity: 1;
            }

            /* Immediate Left Side Item (position -1) */
            .carousel-item[data-position="left-1"] {
                z-index: 25;
                transform: translateX(-380px) scale(0.8);
                opacity: 0.7;
            }

            /* Immediate Right Side Item (position +1) */
            .carousel-item[data-position="right-1"] {
                z-index: 25;
                transform: translateX(380px) scale(0.8);
                opacity: 0.7;
            }

            /* Far Left Side Item (position -2) */
            .carousel-item[data-position="left-2"] {
                z-index: 20;
                transform: translateX(-720px) scale(0.7);
                opacity: 0.7;
            }

            /* Far Right Side Item (position +2) */
            .carousel-item[data-position="right-2"] {
                z-index: 20;
                transform: translateX(720px) scale(0.7);
                opacity: 0.7;
            }

            /* Items */
            .carousel-item[data-position="hidden"] {
                z-index: 10;
                opacity: 0.5;
                pointer-events: none;
            }

            /* Navigation Buttons */
            .carousel-nav {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                z-index: 40;
                background: white;
                border: 2px solid var(--color-neutral-300, #d4d4d4);
                border-radius: 50%;
                width: 48px;
                height: 48px;
                display: none;
                /* Disabled navigation buttons */
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .carousel-nav:hover {
                background: var(--color-secondary-300, #4a5568);
                border-color: var(--color-secondary-300, #4a5568);
                color: white;
                transform: translateY(-50%) scale(1.1);
            }

            .carousel-nav-prev {
                left: 2rem;
            }

            .carousel-nav-next {
                right: 2rem;
            }

            /* Responsive Design */
            @media (max-width: 1024px) {
                .carousel-container {
                    height: 500px;
                }

                .carousel-card {
                    width: 320px;
                    height: 400px;
                }

                .carousel-item[data-position="left-1"] {
                    transform: translateX(-300px) scale(0.75);
                }

                .carousel-item[data-position="right-1"] {
                    transform: translateX(300px) scale(0.75);
                }

                .carousel-item[data-position="left-2"] {
                    transform: translateX(-560px) scale(0.65);
                    opacity: 0.6;
                }

                .carousel-item[data-position="right-2"] {
                    transform: translateX(560px) scale(0.65);
                    opacity: 0.6;
                }
            }

            @media (max-width: 768px) {
                .carousel-container {
                    height: 450px;
                }

                .carousel-card {
                    width: 280px;
                    height: 350px;
                }

                .carousel-item[data-position="left-1"] {
                    transform: translateX(-280px) scale(0.7);
                    opacity: 0.5;
                }

                .carousel-item[data-position="right-1"] {
                    transform: translateX(280px) scale(0.7);
                    opacity: 0.5;
                }

                /* Hide far items on tablet */
                .carousel-item[data-position="left-2"],
                .carousel-item[data-position="right-2"] {
                    opacity: 0;
                    transform: translateX(-500px) scale(0.5);
                }

                .carousel-item[data-position="right-2"] {
                    transform: translateX(500px) scale(0.5);
                }

                .carousel-nav {
                    width: 40px;
                    height: 40px;
                }

                .carousel-nav-prev {
                    left: 1rem;
                }

                .carousel-nav-next {
                    right: 1rem;
                }
            }

            @media (max-width: 640px) {

                /* Show only center item on mobile */
                .carousel-item[data-position="left-1"],
                .carousel-item[data-position="right-1"],
                .carousel-item[data-position="left-2"],
                .carousel-item[data-position="right-2"] {
                    opacity: 0;
                    transform: translateX(-200px) scale(0.5);
                }

                .carousel-item[data-position="right-1"],
                .carousel-item[data-position="right-2"] {
                    transform: translateX(200px) scale(0.5);
                }
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const track = document.getElementById('carousel-track');
                const items = Array.from(track.querySelectorAll('.carousel-item'));
                const prevBtn = document.getElementById('prev-btn');
                const nextBtn = document.getElementById('next-btn');

                const totalCards = {{ count($labCards) }};
                let currentIndex = 0;
                let autoSlideInterval = null;
                let isPaused = false;

                // Touch/Swipe Support
                let touchStartX = 0;
                let touchEndX = 0;

                /**
                 * Update carousel positions and styles based on current index
                 */
                function updateCarousel() {
                    items.forEach((item, index) => {
                        // Calculate relative position from current index
                        let position = index - currentIndex;

                        // Handle wrap-around for infinite loop
                        if (position < -Math.floor(totalCards / 2)) {
                            position += totalCards;
                        } else if (position > Math.ceil(totalCards / 2)) {
                            position -= totalCards;
                        }

                        // Assign position class for 5-item display
                        if (position === 0) {
                            item.setAttribute('data-position', 'center');
                        } else if (position === -1) {
                            item.setAttribute('data-position', 'left-1');
                        } else if (position === 1) {
                            item.setAttribute('data-position', 'right-1');
                        } else if (position === -2) {
                            item.setAttribute('data-position', 'left-2');
                        } else if (position === 2) {
                            item.setAttribute('data-position', 'right-2');
                        } else {
                            item.setAttribute('data-position', 'hidden');
                        }
                    });
                }

                /**
                 * Navigate to next slide
                 */
                function nextSlide() {
                    currentIndex = (currentIndex + 1) % totalCards;
                    updateCarousel();
                }

                /**
                 * Navigate to previous slide
                 */
                function prevSlide() {
                    currentIndex = (currentIndex - 1 + totalCards) % totalCards;
                    updateCarousel();
                }

                /**
                 * Start auto-play
                 */
                function startAutoSlide() {
                    if (autoSlideInterval) {
                        clearInterval(autoSlideInterval);
                    }
                    autoSlideInterval = setInterval(() => {
                        if (!isPaused) {
                            nextSlide();
                        }
                    }, 3000); // Auto-slide every 3 seconds
                }

                /**
                 * Stop auto-play
                 */
                function stopAutoSlide() {
                    if (autoSlideInterval) {
                        clearInterval(autoSlideInterval);
                        autoSlideInterval = null;
                    }
                }

                // Touch event handlers
                function handleTouchStart(e) {
                    touchStartX = e.changedTouches[0].screenX;
                }

                function handleTouchEnd(e) {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                }

                function handleSwipe() {
                    const swipeThreshold = 50; // Minimum distance for swipe
                    const diff = touchStartX - touchEndX;

                    if (Math.abs(diff) > swipeThreshold) {
                        if (diff > 0) {
                            // Swiped left - go to next
                            nextSlide();
                        } else {
                            // Swiped right - go to previous
                            prevSlide();
                        }
                    }
                }

                // Event Listeners
                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    stopAutoSlide();
                    startAutoSlide(); // Restart auto-slide after manual navigation
                });

                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    stopAutoSlide();
                    startAutoSlide(); // Restart auto-slide after manual navigation
                });

                // Pause on hover
                track.addEventListener('mouseenter', () => {
                    isPaused = true;
                });

                track.addEventListener('mouseleave', () => {
                    isPaused = false;
                });

                // Touch/Swipe support
                track.addEventListener('touchstart', handleTouchStart, false);
                track.addEventListener('touchend', handleTouchEnd, false);

                // Keyboard navigation
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') {
                        prevSlide();
                        stopAutoSlide();
                        startAutoSlide();
                    } else if (e.key === 'ArrowRight') {
                        nextSlide();
                        stopAutoSlide();
                        startAutoSlide();
                    }
                });

                // Initialize carousel
                updateCarousel();
                startAutoSlide();
            });
        </script>
    </div>
</section>