<!-- Hero Section Component - Full width hero with background -->
<section {{ $attributes->merge(['class' => 'relative w-full min-h-screen flex items-center justify-center bg-gradient-to-br from-primary-100 to-neutral-100 overflow-hidden']) }}>
    {{ $slot }}
</section>
