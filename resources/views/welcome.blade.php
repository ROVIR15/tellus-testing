@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    @include('components.section-hero')

    <!-- Inside The Lab Section -->
    @include('components.section-inside-the-lab')

    <!-- Lab Services Section -->
    @include('components.section-lab-services')

    <!-- Who We Serve Section -->
    @include('components.section-who-we-serve')

    <x-section class="relative">
        <div class="py-8">
            <img src="{{ asset('images/vector-3.svg') }}" alt="Decorative element"
                class="h-auto absolute -top-250 right-0 -z-10">
            <x-heading-display-3>
                "Trusted by engineers, builders, and decision-makers across
                <span style="background: linear-gradient(180deg, #2D6BB4 0%, #2F68B1 28%, #355FA7 49%, #415097 68%, #513B81 85%, #652266 100%);
                                                        -webkit-background-clip: text;
                                                        background-clip: text;
                                                        color: transparent;">continents
                    infrastructure landscape.</span>"
            </x-heading-display-3>
        </div>
    </x-section>

    <div style="background: linear-gradient(180deg, rgba(255, 255, 255, 0) 6.77%, #EBF5FF 60.00%);">
        <x-section-testimony />

        <div class="flex flex-col items-center gap-14 py-18">
            <div class="flex flex-row justify-center items-center custom-color">
                <x-heading-h1><span>Trusted by Industry Professionals</span></x-heading-h1>
            </div>

            <!-- hugging client -->
            <x-client-marquee speed="30" aspectRatio="1312/48" />
        </div>
    </div>

    <div class="relative">
        <img src="{{ asset('images/elipse-6.svg') }}" alt="decorative background"
            class="absolute hidden md:block bottom-0 w-full left-0 md:top-0 pointer-events-none select-none" style="z-index:-1;">
        
        <img src="{{ asset('images/bg-fqa-eclipse.svg') }}" alt="decorative background"
            class="absolute bottom-[-600px] w-full left-0 md:hidden" style="z-index:-1;">
        @include('components.section-inquiry')

        @include('components.faq-section')
    </div>

    <div class="relative md:pt-40 py-10 px-8 md:px-12">
        <x-latest-news-section :max-news-items="4" :button-label="'Show More News'" />
    </div>

@endsection