@props([
    'label' => null,
    'description' => null,
    'details' => null,
    'buttonText' => 'View Details',
    'hideButtonText' => 'Hide Details',
])

<!-- Test Detail Card Component with Expandable Details -->
<div 
    x-data="{ 
        isExpanded: false
    }"
    @class([
        'test-detail-card pink-border transition-all duration-300 ease-in-out rounded-2xl border border-solid p-6 gap-6 opacity-100 flex flex-col',
        'expanded' => false,
    ])
    :class="{ 'expanded': isExpanded }"
>
    <!-- Label -->
    @if($label ?? false)
        <h3 class="heading-4 text-neutral-1000">{{ $label }}</h3>
    @endif

    <!-- Description -->
    @if($description ?? false)
        <p class="body-2 text-neutral-800">{{ $description }}</p>
    @endif

    <!-- Details Section - Hidden by default -->
    <div 
        x-show="isExpanded" 
        class="overflow-hidden"
        style="display: none;"
        x-transition:enter="transition ease-in-out duration-300"
        x-transition:leave="transition ease-in-out duration-300"
    >
        @if($details ?? false)
            <div class="body-3 text-neutral-700 leading-relaxed">
                {{ $details }}
            </div>
        @endif
    </div>

    <!-- Button -->
    <div class="mt-auto">
        <button
            @click="isExpanded = !isExpanded"
            type="button"
            class="inline-flex items-center justify-center font-semibold rounded-full transition-all duration-300 ease-in-out"
            style="
                padding: 10px 16px;
                gap: 8px;
                color: var(--color-primary-300);
                background-color: var(--color-primary-100);
            "
        >
            <span x-text="isExpanded ? '{{ $hideButtonText }}' : '{{ $buttonText }}'"></span>
        </button>
    </div>
</div>
