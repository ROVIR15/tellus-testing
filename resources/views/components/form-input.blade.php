{{-- Form Input Component with Multirow Support, Sizes, Placeholder, Label, and Icons --}}
@php
    // Get component properties
    $label = $attributes->get('label', null);
    $placeholder = $attributes->get('placeholder', '');
    $size = $attributes->get('size', 'medium'); // small, medium, large
    $multirow = filter_var($attributes->get('multirow', false), FILTER_VALIDATE_BOOLEAN);
    $rows = $attributes->get('rows', 4); // Number of rows for textarea
    $name = $attributes->get('name', '');
    $id = $attributes->get('id', $name ?: 'input-' . uniqid());
    $disabled = filter_var($attributes->get('disabled', false), FILTER_VALIDATE_BOOLEAN);
    $required = filter_var($attributes->get('required', false), FILTER_VALIDATE_BOOLEAN);
    $error = $attributes->get('error', null);
    $value = $attributes->get('value', '');
    $iconPosition = $attributes->get('icon-position', 'left'); // left or right
    $hasIcon = isset($icon);
    $customStyles = $attributes->get('style', '');
    
    // Build size classes for height
    $sizeClasses = match($size) {
        'small' => 'h-10',
        'large' => 'h-14',
        default => 'h-12', // medium
    };
    
    // Build base input classes
    $baseClasses = "form-input w-full px-4 py-2 rounded-lg border-2 border-gray-300 transition-colors duration-200 font-body-2 bg-white text-gray-900";
    $baseClasses .= " focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200";
    $baseClasses .= " disabled:bg-gray-100 disabled:cursor-not-allowed disabled:opacity-60";
    
    if ($error) {
        $baseClasses .= " border-red-500 focus:border-red-500 focus:ring-red-200";
    }
    
    // Add padding when icon is present
    if ($hasIcon) {
        if ($iconPosition === 'left') {
            $baseClasses .= " pl-10";
        } else {
            $baseClasses .= " pr-10";
        }
    }
    
    // Add size classes for single line input
    if (!$multirow) {
        $baseClasses .= " {$sizeClasses}";
    }
@endphp

<div class="form-input-wrapper flex flex-col gap-2" style="{{ $customStyles }}">
    <!-- Label -->
    @if($label)
        <label 
            for="{{ $id }}"
            class="block text-md"
            style="color: var(--color-secondary-300);"
        >
            {{ $label }}
            @if($required)
                <span class="text-red-500 ml-1">*</span>
            @endif
        </label>
    @endif

    <!-- Input Container with Icon Support -->
    <div class="relative">
        <!-- Input or Textarea -->
        @if($multirow)
            <textarea
                id="{{ $id }}"
                name="{{ $name }}"
                rows="{{ $rows }}"
                placeholder="{{ $placeholder }}"
                {{ $attributes->merge(['class' => $baseClasses]) }}
                style="border-radius: 16px;"
                @if($disabled) disabled @endif
                @if($required) required @endif
            >{{ $value }}</textarea>
        @else
            <input
                type="text"
                id="{{ $id }}"
                name="{{ $name }}"
                placeholder="{{ $placeholder }}"
                value="{{ $value }}"
                style="border-radius: 16px;"
                {{ $attributes->merge(['class' => $baseClasses]) }}
                @if($disabled) disabled @endif
                @if($required) required @endif
            />
        @endif

        <!-- Left Icon -->
        @if($hasIcon && $iconPosition === 'left')
            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 flex items-center justify-center text-gray-400">
                {{ $icon }}
            </span>
        @endif

        <!-- Right Icon -->
        @if($hasIcon && $iconPosition === 'right')
            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 flex items-center justify-center text-gray-400">
                {{ $icon }}
            </span>
        @endif
    </div>

    <!-- Error Message -->
    @if($error)
        <p class="text-xs text-red-500 mt-1">{{ $error }}</p>
    @endif
</div>
