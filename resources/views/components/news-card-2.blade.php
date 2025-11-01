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
@endphp

<div class="news-card-2 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 bg-white min-h-[94px]">
    <!-- Horizontal Layout: Image Left, Content Right -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
        <!-- Image Container -->
        <div class="relative h-64 md:h-auto overflow-hidden bg-gray-200 order-2 md:order-1 min-h-[94px]" style="border-radius: 10px;">
            <img 
                src="{{ $imageSrc }}" 
                alt="{{ $imageAlt }}"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
            />
            
            <!-- Status Badge on Image -->
            @if($status)
                <div class="absolute top-4 left-4">
                    <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold text-white" style="
                        background-color: var(--color-primary-300);
                    ">
                        {{ $status }}
                    </span>
                </div>
            @endif
        </div>

        <!-- Content Container -->
        <div class="flex flex-col justify-between order-1 md:order-2">
            <!-- Title -->
            @if($slot->isNotEmpty())
                <div>
                    <h3 class="heading-7 md:heading-3 text-neutral-1000 leading-tight mb-4">
                        {{ $slot }}
                    </h3>
                </div>
            @endif

            <!-- Meta Information and Description -->
            <div class="space-y-4 flex-1 body-3">
                <!-- Date -->
                <div class="flex items-center gap-2 text-sm text-neutral-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Published on {{ $formattedDate }}</span>
                </div>

                <!-- Description Slot (Optional) -->
                @if($description ?? false)
                    <p class="body-2 text-neutral-700 line-clamp-3">
                        {{ $description }}
                    </p>
                @endif
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
    </div>
</div>
