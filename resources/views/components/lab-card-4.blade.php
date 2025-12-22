{{-- Lab Card 4 Component - Modern Testing Lab Card --}}
@php
    // Get component properties
    $labName = $attributes->get('lab_name', 'Laboratory Test');
    $testType = $attributes->get('test_type', '');
    $standards = $attributes->get('standards', []);
    $turnaroundTime = $attributes->get('turnaround_time', '');
    $description = $attributes->get('description', '');
    $icon = $attributes->get('icon', '');

    // Format standards as a list if provided
    $standardsList = is_array($standards) ? $standards : [];
@endphp

<div class="relative lab-card-4 rounded-3xl overflow-hidden transition-all duration-300 cursor-pointer"
    style="color: var(--color-secondary-300);">
    <!-- Card Content -->
    <img src="{{ asset('images/vector-4.svg') }}" alt="Decorative element" class="w-full h-auto absolute -top-10
                                                 -right-10 z-10">

    <div class="relative flex flex-col gap-12 z-10" style="color: var(--color-secondary-100);">
        <!-- Quality Standards Section -->
        @if(count($standardsList) > 0)
            <div class="flex flex-col gap-1" style="color: var(--color-secondary-100);">
                <h4 class="heading-6 font-semibold" style="color: var(--color-secondary-100);">Quality Standards</h4>
                <ul class="space-y-2">
                    @foreach($standardsList as $standard)
                        <li class="flex items-center body-1" style="color: var(--color-secondary-100);">
                            <span class="mr-2" style="color: var(--color-secondary-100);">•</span>
                            {{ $standard }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex flex-col gap-2 pl-3">
            <!-- Turnaround Time Section -->
            @if($turnaroundTime)
                <div>
                    <h4 class="heading-6 font-semibold" style="color: var(--color-secondary-100);">Fast Turnaround</h4>
                    <p class="body-1" style="color: var(--color-secondary-100);">
                        {{ $turnaroundTime }}
                    </p>
                </div>
            @endif

            <!-- Description Section -->
            @if($description)
                <div>
                    <p class="body-1" style="color: var(--color-secondary-100);">
                        {{ $description }}
                    </p>
                </div>
            @endif
        </div>

        <!-- Slot for Additional Content -->
        <!-- @if($slot->isNotEmpty())
            <div class="mt-2">
                {{ $slot }}
            </div>
        @endif -->

        <!-- Request Testing Button -->
        <!-- <div class="mt-auto pt-4">
            <a href="{{ $attributes->get('href', '#') }}" 
               class="inline-flex items-center justify-center w-full px-4 py-2 bg-secondary-500 hover:bg-secondary-600 text-white font-medium rounded-lg transition-colors"
               aria-label="Request testing for {{ $labName }}">
                Request Testing
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div> -->
    </div>
</div>