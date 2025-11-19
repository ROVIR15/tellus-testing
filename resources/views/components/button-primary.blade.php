<!-- Button Component: Primary CTA Button -->
<button 
    {{ $attributes->merge(['class' => 'btn-primary w-full rounded-full px-6 py-3 text-white font-bold']) }}
>
    {{ $slot }}
</button>
