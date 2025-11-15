<!-- Hero Section Component - Full width hero with background -->
<section {{ $attributes->merge(['class' => 'relative w-full min-h-screen px-12 flex items-center justify-center bg-gradient-to-br from-primary-100 to-neutral-100 overflow-hidden pt-24 md:pt-38 lg:pt-40']) }}>
    {{ $slot }}
</section>
