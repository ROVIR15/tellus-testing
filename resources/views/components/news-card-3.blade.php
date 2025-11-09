{{-- News Card 3 Component - Modern Responsive Layout --}}
@php
    // Get component properties
    $images = $attributes->get('images', []);
    $status = $attributes->get('status', '');
    $createdAt = $attributes->get('created_at', null);
    $author = $attributes->get('author', '');
    $category = $attributes->get('category', '');
    $readTime = $attributes->get('read_time', '');
    // Image display controls
    $aspect = $attributes->get('aspect', '4/3'); // allows 16/9, 4/3, 1/1, 3/2
    $fit = $attributes->get('fit', 'cover'); // cover or contain
    $position = $attributes->get('position', 'center'); // center, top, bottom, left, right
    
    // Format the unix timestamp to readable date
    $formattedDate = $createdAt 
        ? 'Published on ' . \Carbon\Carbon::createFromTimestamp($createdAt)->format('d F Y \a\t h:i A') 
        : 'No date';
    
    // Get the first image or use placeholder
    $imageSrc = is_array($images) && count($images) > 0 
        ? $images[0] 
        : 'https://via.placeholder.com/1200x675?text=No+Image';
    $imageAlt = $attributes->get('title', 'News Image') ?? 'News Image';

    // Map aspect ratios to Tailwind padding-top classes to avoid inline style interpolation
    switch ($aspect) {
        case '1/1':
            $containerPaddingClass = 'pt-[100%]';
            break;
        case '3/2':
            $containerPaddingClass = 'pt-[66.6667%]';
            break;
        case '4/3':
            $containerPaddingClass = 'pt-[75%]';
            break;
        case '16/9':
        default:
            $containerPaddingClass = 'pt-[56.25%]';
            break;
    }

    // Map fit and position to Tailwind utility classes (no inline CSS)
    $fitClass = $fit === 'contain' ? 'object-contain' : 'object-cover';
    $posClass = match ($position) {
        'top' => 'object-top',
        'bottom' => 'object-bottom',
        'left' => 'object-left',
        'right' => 'object-right',
        default => 'object-center',
    };
@endphp

<div class="news-card-3 rounded-xl overflow-hidden hover:scale-[1.02] transition-all duration-30 dark:bg-neutral-800 cursor-pointer max-w-full sm:max-w-[calc(50%-1rem)] lg:max-w-[calc(33.333%-1rem)] xl:max-w-[calc(25%-1rem)] flex flex-col gap-3" 
     onclick="window.location.href='{{ $attributes->get('href', '#') }}'"
     style="min-width:fit-content;"
>
    <!-- Image Container with configurable aspect ratio -->
    <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 {{ $containerPaddingClass }} rounded-[10px]">
        <!-- Image with overlay for better text contrast -->
        <img 
            src="{{ $imageSrc }}"
            alt="{{ $imageAlt }}"
            class="absolute inset-0 w-full h-full hover:scale-105 transition-transform duration-300 {{ $fitClass }} {{ $posClass }}"
            loading="lazy"
        />
        <!-- <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-60"></div> -->
        
        <!-- Status Badge -->
        <!-- @if($status)
            <div class="absolute top-4 left-4 z-10">
                <span class="inline-block px-3 py-1.5 rounded-full text-sm font-semibold text-white" style="
                    background-color: var(--color-primary-300);
                ">
                    {{ $status }}
                </span>
            </div>
        @endif -->
    </div>

    <!-- Content Container -->
    <div class="flex flex-col gap-2">
        <!-- Title -->
        @if($slot->isNotEmpty())
            <h3 class="subheading-3 md:text-2xl font-bold text-neutral-1000 dark:text-white line-clamp-2 leading-tight">
                {{ $slot }}
            </h3>
        @endif

        <!-- Meta Information -->
        <div class="flex flex-wrap items-center gap-4 body-3 text-neutral-600 dark:text-neutral-400">
            <div class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>{{ $formattedDate }}</span>
            </div>
            
            <!-- @if($author)
            <div class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>{{ $author }}</span>
            </div>
            @endif
            
            @if($category)
            <div class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                <span>{{ $category }}</span>
            </div>
            @endif
            
            @if($readTime)
            <div class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $readTime }} min read</span>
            </div>
            @endif -->
        </div>

        <!-- Read More Link -->
        <!-- <div class="pt-2 mt-auto">
            <a href="{{ $attributes->get('href', '#') }}" class="inline-flex items-center gap-2 text-sm font-medium text-primary-500 hover:text-primary-600 dark:text-primary-400 dark:hover:text-primary-300 transition-colors" aria-label="Read more about {{ $imageAlt }}">
                Read More
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div> -->
    </div>
</div>
