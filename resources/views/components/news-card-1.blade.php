{{-- News Card Component --}}
@php
    // Get component properties
    $images = $attributes->get('images', []);
    $status = $attributes->get('status', '');
    $createdAt = $attributes->get('created_at', null);

    // Format the unix timestamp to readable date
    $formattedDate = $createdAt ? \Carbon\Carbon::createFromTimestamp($createdAt)->format('d M Y \a\t h:i A') : 'No date';

    // Get the first image or use placeholder
    $imageSrc = is_array($images) && count($images) > 0 ? $images[0] : 'https://via.placeholder.com/800x400?text=No+Image';
    $imageAlt = $attributes->get('title', 'News Image') ?? 'News Image';

    $class = $attributes->get('class', '');

    $class = $class == '' ? 'h-90' : $class;
@endphp

<div
    class="news-card-1 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 relative {{ $class }}">
    <!-- Image Container (Full Background) -->
    <div class="absolute inset-0 overflow-hidden bg-gray-200">
        <img src="{{ $imageSrc }}" alt="{{ $imageAlt }}"
            class="w-full h-full hover:scale-105 transition-transform duration-300" />

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"
            style="background: linear-gradient(180deg, rgba(80, 80, 80, 0) 49.07%, #505050 100%);"></div>
    </div>

    <!-- Status Badge -->
    <!-- @if($status)
        <div class="absolute top-4 left-4 z-10">
            <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold text-white" style="
                background-color: var(--color-primary-300);
            ">
                {{ $status }}
            </span>
        </div>
    @endif -->

    <!-- Content Container (Overlay at Bottom) -->
    <div class="absolute bottom-0 left-0 right-0 p-6 flex flex-col gap-4 z-20">
        <!-- Title -->
        @if($slot->isNotEmpty())
            <p class="heading-1 text-white line-clamp-2">
                {{ $slot }}
            </p>
        @endif

        <!-- Meta Information -->
        <div class="flex items-center gap-4 text-sm text-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span>Published on {{ $formattedDate }}</span>
        </div>

        <!-- Read More Link -->
        <!-- <div class="pt-2">
            <a href="{{ $attributes->get('href', '#') }}" class="inline-flex items-center gap-2 text-gray-100 hover:text-white font-semibold transition-colors">
                Read More
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div> -->
    </div>
</div>