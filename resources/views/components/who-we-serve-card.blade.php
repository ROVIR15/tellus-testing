@props(['title', 'image' => null, 'description' => null, 'width' => '421.3333435058594px', 'height' => '396.25px', 'gap' => '24px', 'angle' => '0deg', 'opacity' => '1', 'borderRadius' => '24px', 'borderWidth' => '1px', 'padding' => '16px', 'left' => null, 'rowStart' => 1, 'colStart' => 2, 'colSpan' => 3, 'rowSpan' => 1])

<!-- Who We Serve Card -->
<div {{ $attributes->merge(['class' => 'bg-primary-100 rounded-2xl overflow-hidden transition-all duration-300 p-6 flex flex-col gap-6']) }} 
    style="
        border: 1px solid;
        border-image-source: linear-gradient(154.97deg, #C3E0FA 15.92%, #59ADFA 100.32%);
        background: radial-gradient(54.46% 69.08% at 104.46% 102.29%, #EBF5FF 0%, #CDE3F7 100%);
    ">
    @if($image)
        <div 
            class="h-40 bg-neutral-300 overflow-hidden"
            style="height: 270px;"
        >
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover">
        </div>
    @else
        <div 
            class="w-full h-40 bg-gradient-to-br from-primary-200 to-primary-300 flex items-center justify-center"
            style="height: 389px;"
        >
            <div class="text-center">
                <div class="text-4xl mb-2">🏢</div>
                <p class="text-primary-600 text-xs">Image Placeholder</p>
            </div>
        </div>
    @endif

    <x-heading-h2 class="text-primary-200" style="font-weight: 400; color: var(--color-primary-300);">
        {{ $title }}
    </x-heading-h2>

</div>