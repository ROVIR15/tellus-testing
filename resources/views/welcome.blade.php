@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    @include('components.section-hero')

    <!-- Who We Serve Section -->
    @include('components.section-who-we-serve')

    <!-- Inside The Lab Section -->
    @include('components.section-inside-the-lab')

    <!-- Lab Services Section -->
    @include('components.section-lab-services')

    <x-section>
        <x-heading-display-3>
            "Trusted by engineers, builders, and decision-<br>makers across
            <span style="background: linear-gradient(180deg, #2D6BB4 0%, #2F68B1 28%, #355FA7 49%, #415097 68%, #513B81 85%, #652266 100%);
                    -webkit-background-clip: text;
                    background-clip: text;
                    color: transparent;">continents infrastructure<br></span> landscape."
        </x-heading-display-3>
    </x-section>

    @include('components.section-testimony')

    <x-section>
        <p>our clients</p>
    </x-section>

    <div class="relative">
        <img src="{{ asset('images/elipse-6.svg') }}" alt="decorative background" class="absolute left-0 top-0 w-full pointer-events-none select-none" style="z-index:-1;">
        @include('components.section-inquiry')

        @include('components.faq-section')
    </div>

    <!-- Latest News Section -->
    <x-latest-news-section :max-news-items="3" />

@endsection