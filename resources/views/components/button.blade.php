{{-- Enhanced Button Component with Support for Variants, Sizes, States, and Icons --}}
@php
    // Determine the variant (primary, secondary, accent)
    $variant = $attributes->get('variant', 'primary');
    
    // Determine the size (sm, md, lg)
    $size = $attributes->get('size', 'md');
    
    // Determine if button is disabled
    $disabled = $attributes->get('disabled', false);
    
    // Icon slot and position
    $iconPosition = $attributes->get('icon-position', 'left'); // left or right
    $hasIcon = isset($icon) || $slot->isNotEmpty();
    
    // Build base button classes
    $baseClasses = "btn btn-{$variant} btn-{$size}";
    
    // Add disabled state
    if ($disabled) {
        $baseClasses .= ' btn-disabled opacity-50 cursor-not-allowed';
    }
    
    // Merge additional attributes
    $mergedClasses = $attributes->merge(['class' => $baseClasses]);
@endphp

<button 
    {{ $mergedClasses }}
    style="border-radius: 28px; background-color: linear-gradient(352.51deg, #660A66 14.94%, #CC14CC 131.28%);
;"
    @if($disabled) disabled @endif
>
    {{-- Icon on the left --}}
    @if($iconPosition === 'left' && isset($icon))
        <span class="btn-icon btn-icon-left">
            {{ $icon }}
        </span>
    @endif
    
    {{-- Button text --}}
    @if($slot->isNotEmpty())
        <span class="btn-text">{{ $slot }}</span>
    @endif
    
    {{-- Icon on the right --}}
    @if($iconPosition === 'right' && isset($icon))
        <span class="btn-icon btn-icon-right">
            {{ $icon }}
        </span>
    @endif
</button>
