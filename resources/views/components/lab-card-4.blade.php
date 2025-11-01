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

<div
    class="lab-card-4 rounded-xl overflow-hidden shadow-md hover:shadow-xl hover:scale-[1.02] transition-all duration-300 cursor-pointer" style="color: var(--color-secondary-300);">
    <!-- Card Header with Icon -->
    <!-- <div class="bg-secondary-500 text-white p-6">
        <div class="flex items-center justify-between">
            <h3 class="text-xl md:text-2xl font-bold leading-tight">{{ $labName }}</h3>
            @if($icon)
                <div class="text-white">
                    {!! $icon !!}
                </div>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                </svg>
            @endif
        </div>
        @if($testType)
            <div class="mt-2 text-sm font-medium">{{ $testType }}</div>
        @endif
    </div> -->

    <!-- Card Content -->
    <div class="flex flex-col gap-12" style="color: var(--color-secondary-100);">
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