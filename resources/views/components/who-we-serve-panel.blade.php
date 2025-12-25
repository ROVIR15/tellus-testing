@props(['title', 'description', 'icon' => '🌀', 'gap' => '32px', 'angle' => '0deg', 'opacity' => '1', 'borderRadius' => '24px', 'padding' => '40px', 'rowStart' => 1, 'colStart' => 1, 'colSpan' => 1, 'rowSpan' => 2])

<!-- Who We Serve Left Panel -->
<div {{ $attributes->merge(['class' => 'shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col gap-8 justify-start p-8 rounded-4xl']) }}
    style="background: radial-gradient(3072.21% 55% at 100% 0%, #76B2E8 0%, #006ACC 100%) /* warning: gradient uses a rotation that is not supported by CSS and may not behave as expected */;">
    <!-- Icon Circle -->
    <div class="flex justify-start">
        <div class="bg-primary-300 rounded-full flex items-center justify-center" style="width: 220px;">
            <image src="{{ asset('images/logo-icon.svg') }}" alt="tellus-icon" />
        </div>
    </div>

    <div class="flex flex-col gap-8">
        <!-- Heading -->
        <x-heading-display-3 class="text-start md:text-left" style="color: var(--color-primary-100);">
            Who We Serve
        </x-heading-display-3>

        <!-- Description -->
        <x-subheading-1 class=" font-medium" style="font-weight: 500; color: var(--color-primary-100);">
            {{ $description }}
        </x-subheading-1>
    </div>

    <!-- Slot for additional content -->
    {{ $slot }}
</div>