<!-- Button Component: Primary CTA Button -->
<button 
    {{ $attributes->merge(['class' => 'btn-primary']) }}
>
    {{ $slot }}
</button>
