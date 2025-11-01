<!-- Button Component: Secondary Button -->
<button 
    {{ $attributes->merge(['class' => 'btn-secondary']) }}
>
    {{ $slot }}
</button>
