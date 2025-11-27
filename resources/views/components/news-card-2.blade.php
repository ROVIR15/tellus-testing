{{-- News Card 2 Component - Horizontal Layout --}}
@php
    // Get component properties
    $images = $attributes->get('images', []);
    $status = $attributes->get('status', '');
    $createdAt = $attributes->get('created_at', null);

    // Format the unix timestamp to readable date
    $formattedDate = $createdAt ? \Carbon\Carbon::createFromTimestamp($createdAt)->format('d M Y \a\t h:i A') : 'No date';

    // Get the first image or use placeholder
    $imageSrc = is_array($images) && count($images) > 0 ? $images[0] : 'https://via.placeholder.com/400x300?text=No+Image';
    $imageAlt = $attributes->get('title', 'News Image') ?? 'News Image';
    $href = $attributes->get('href', '#');
@endphp

<a href="{{ $href }}" class="flex flex-row gap-2 md:gap-4 max-h-[200px] md:max-h-[94px] no-underline cursor-pointer">
    <!-- Horizontal Layout: Image Left,ı Content Right -->
    <!-- Image Container -->
    <img src="{{ $imageSrc }}" alt="{{ $imageAlt }}" class="object-fit-cover rounded-2xl max-w-[180px] md:max-w-[141px]" aspect-ratio="141/94" />

    <div class="flex flex-col gap-2 md:gap-4">
        <!-- Title -->
        @if($slot->isNotEmpty())
            <div>
                <span class="heading-7 md:heading-3 block line-clamp-2">
                    {{ $slot }}
                </span>
            </div>
        @endif

        <!-- Meta Information and Description -->
        <div class="body-3">
            <!-- Date -->
            <div class="flex">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg> -->
                <span class="body-3">Published on {{ $formattedDate }}</span>
            </div>

            <!-- Description Slot (Optional) -->
            <!-- @if($description ?? false)
                    <p class="body-2 text-neutral-700 line-clamp-3">
                        {{ $description }}
                    </p>
                @endif -->
        </div>

        <!-- Read More Link -->
        <!-- <div class="pt-4">
                <a href="{{ $attributes->get('href', '#') }}" class="inline-flex items-center gap-2 text-primary-300 hover:text-primary-400 font-semibold transition-colors">
                    Read More
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div> -->
    </div>
</a>
