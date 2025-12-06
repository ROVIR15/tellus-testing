@php
    // get additional class and merge
    $additionalClass = $attributes->get('class', '');
    $mergedClass = 'section ' . $additionalClass;
@endphp

<!-- Section Component - Standard spacing -->
<section {{ $attributes->merge(['class' => $mergedClass]) }}>
    {{ $slot }}
</section>
