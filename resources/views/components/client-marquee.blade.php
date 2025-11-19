@props([
    'speed' => 30,       // seconds for one complete cycle
    'gap' => 14,         // allowed: 8, 10, 14, 18 (72px)
])

@php
    $gapClass = match((int) $gap) {
        8  => 'gap-8',
        10 => 'gap-10',
        14 => 'gap-14',
        18 => 'gap-[72px]',
        default => 'gap-14',
    };

    $uniqueId = 'marquee-' . uniqid();
@endphp

<div class="relative w-full overflow-hidden" style="height: 3rem;">
    <div id="{{ $uniqueId }}" 
         class="flex items-center {{ $gapClass }} marquee-container"
         style="animation: marquee-scroll {{ (int) $speed }}s linear infinite;">
        
        @for ($i = 0; $i < 2; $i++)
            <div class="flex items-center {{ $gapClass }} shrink-0">
                <img class="h-12 w-auto shrink-0 select-none" src="{{ asset('images/client/1.png') }}" alt="{{ $i === 0 ? 'client 1' : '' }}" />
                <img class="h-12 w-auto shrink-0 select-none" src="{{ asset('images/client/2.png') }}" alt="{{ $i === 0 ? 'client 2' : '' }}" />
                <img class="h-12 w-auto shrink-0 select-none" src="{{ asset('images/client/3.png') }}" alt="{{ $i === 0 ? 'client 3' : '' }}" />
                <img class="h-12 w-auto shrink-0 select-none" src="{{ asset('images/client/4.png') }}" alt="{{ $i === 0 ? 'client 4' : '' }}" />
                <img class="h-12 w-auto shrink-0 select-none" src="{{ asset('images/client/5.png') }}" alt="{{ $i === 0 ? 'client 5' : '' }}" />
                <img class="h-12 w-auto shrink-0 select-none" src="{{ asset('images/client/6.png') }}" alt="{{ $i === 0 ? 'client 6' : '' }}" />
                <img class="h-12 w-auto shrink-0 select-none" src="{{ asset('images/client/7.png') }}" alt="{{ $i === 0 ? 'client 7' : '' }}" />
                <img class="h-12 w-auto shrink-0 select-none" src="{{ asset('images/client/8.png') }}" alt="{{ $i === 0 ? 'client 8' : '' }}" />
            </div>
        @endfor
    </div>
</div>

<style>
@keyframes marquee-scroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

.marquee-container:hover {
    animation-play-state: paused;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const marquee = document.getElementById('{{ $uniqueId }}');
    if (!marquee) return;

    // Wait for images to load before starting animation
    const images = marquee.querySelectorAll('img');
    let loadedCount = 0;
    const totalImages = images.length;

    function checkAllLoaded() {
        loadedCount++;
        if (loadedCount === totalImages) {
            marquee.style.opacity = '1';
        }
    }

    marquee.style.opacity = '0';
    marquee.style.transition = 'opacity 0.3s';

    images.forEach(img => {
        if (img.complete) {
            checkAllLoaded();
        } else {
            img.addEventListener('load', checkAllLoaded);
            img.addEventListener('error', checkAllLoaded);
        }
    });
});
</script>