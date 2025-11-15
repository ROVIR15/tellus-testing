{{-- News Card Component --}}
@php
    // Get component properties
    $images = $attributes->get('images', '');

    // Get the first image or use placeholder
    $imageSrc = $images !== '' ? $images : 'https://via.placeholder.com/800x400?text=No+Image';
    $imageAlt = $attributes->get('title', 'News Image') ?? 'News Image';

    // style
    $style = $attributes->get('style', '');
@endphp

<div
    class="news-card-1 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 relative h-96 {{ $style }}">
    <!-- Image Container (Full Background) -->
    <div class="absolute inset-0 overflow-hidden bg-gray-200">
        <img src="{{ $imageSrc }}" alt="{{ $imageAlt }}"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" style="aspect-ratio: 640/464;"/>

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"
            style="background: linear-gradient(180deg, rgba(80, 80, 80, 0) 49.07%, #505050 100%);"></div>
    </div>
</div>