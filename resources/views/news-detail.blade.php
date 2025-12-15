@extends('layouts.app')

@section('title', $news->title ?? 'News Detail')
@section('description', ($news->excerpt ?? $news->title ?? 'News') . ' — latest updates and insights')

@section('content')

    @php
        $publishedAt = $news->published_at ? $news->published_at->format('d F Y \\a\\t h:i A') : $news->created_at->format('d F Y \\a\\t h:i A');
        
        // Handle multiple images (JSON or single string)
        $heroImages = $news->hero_images_list;
    @endphp

    <img src="{{ asset('images/decorative-about-us/circle-center.svg') }}" alt="Decorative element"
        class="absolute w-full -z-10">
    <div class="flex flex-col gap-4 pt-40 md:gap-10 mb-16 md:mb-8 px-4 lg:px-8">
        <div class="flex flex-col gap-4 sm:px-6 lg:px-8 text-center">
            <!-- Title & Meta -->
            <span class="display-3 text-inherit" style="color: var(--color-secondary-300);">{{ $news->title }}</span>
            <span class="heading-4" style="color: var(--color-secondary-300);">Published on
                {{ $publishedAt }}</span>
            
            <!-- Hero / Featured Slider -->
            <div class="relative w-full min-h-[300px] h-[300px] md:h-[500px] rounded-lg overflow-hidden group" id="hero-slider">
                <!-- Slides Track -->
                <div class="flex h-full transition-transform duration-500 ease-in-out" id="hero-slider-track">
                    @foreach($heroImages as $index => $img)
                        <div class="min-w-full h-full relative">
                            <img src="{{ $img }}" alt="{{ $news->title }} - Slide {{ $index + 1 }}" class="w-full h-full object-cover" style="background-color: bisque;">
                        </div>
                    @endforeach
                </div>

                @if(count($heroImages) > 1)
                    <!-- Dots -->
                    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-10">
                        @foreach($heroImages as $index => $img)
                            <button data-index="{{ $index }}" class="slider-dot w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition-all {{ $index === 0 ? 'bg-white scale-125' : '' }}" aria-label="Go to slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    
                    <!-- Arrows -->
                    <button id="prev-slide-btn" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-2 rounded-full backdrop-blur-sm transition opacity-0 group-hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button id="next-slide-btn" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-2 rounded-full backdrop-blur-sm transition opacity-0 group-hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                @endif
            </div>
        </div>

        <!-- Slider Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const track = document.getElementById('hero-slider-track');
                const dots = document.querySelectorAll('.slider-dot');
                const prevBtn = document.getElementById('prev-slide-btn');
                const nextBtn = document.getElementById('next-slide-btn');
                const totalSlides = {{ count($heroImages) }};
                
                if (totalSlides <= 1) return;

                let currentSlide = 0;
                let autoSlideInterval;

                function goToSlide(index) {
                    currentSlide = index;
                    updateSlider();
                    resetTimer();
                }

                function nextSlide() {
                    currentSlide = (currentSlide + 1) % totalSlides;
                    updateSlider();
                    resetTimer();
                }

                function prevSlide() {
                    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                    updateSlider();
                    resetTimer();
                }

                function updateSlider() {
                    if(!track) return;
                    track.style.transform = `translateX(-${currentSlide * 100}%)`;
                    
                    dots.forEach((dot, idx) => {
                        if (idx === currentSlide) {
                            dot.classList.add('bg-white', 'scale-125');
                            dot.classList.remove('bg-white/50');
                        } else {
                            dot.classList.remove('bg-white', 'scale-125');
                            dot.classList.add('bg-white/50');
                        }
                    });
                }

                function startTimer() {
                    autoSlideInterval = setInterval(() => {
                        currentSlide = (currentSlide + 1) % totalSlides;
                        updateSlider();
                    }, 5000);
                }

                function resetTimer() {
                    clearInterval(autoSlideInterval);
                    startTimer();
                }

                // Event Listeners
                if (prevBtn) prevBtn.addEventListener('click', prevSlide);
                if (nextBtn) nextBtn.addEventListener('click', nextSlide);
                
                dots.forEach(dot => {
                    dot.addEventListener('click', function() {
                        const index = parseInt(this.dataset.index);
                        goToSlide(index);
                    });
                });

                // Start Auto Slider
                startTimer();
                
                // Pause on hover
                const sliderContainer = document.getElementById('hero-slider');
                if (sliderContainer) {
                    sliderContainer.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
                    sliderContainer.addEventListener('mouseleave', startTimer);
                }
            });
        </script>

        <!-- Article Body -->
        <div class="prose max-w-none md:max-w-[920px] text-left mx-auto">
            {!! $news->content !!}
        </div>

        <div class="flex flex-col sm:px-6 lg:px-8">
            @if(!empty($related) && count($related) > 0)
                <div class="flex flex-row items-center justify-between mb-6">
                    <h2 class="heading-1"><span class="custom-color">Other News</span></h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($related as $article)
                        @php
                            $relatedImage = $article->image_path ? asset('storage/' . $article->image_path) : asset('images/other-news/1.jpg');
                            $relatedTimestamp = optional($article->published_at)->timestamp ?? $article->created_at->timestamp;
                        @endphp
                        <x-news-card-3 :images="[$relatedImage]" :created_at="$relatedTimestamp" :href="route('news-detail', $article->slug)" :title="$article->title">
                            {{ $article->title }}
                        </x-news-card-3>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection