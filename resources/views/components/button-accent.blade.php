<!-- Button Component: Accent Button -->
<button 
    {{ $attributes->merge(['class' => 'btn-accent', 'p-4']) }}
>
    {{ $slot }}
</button>
