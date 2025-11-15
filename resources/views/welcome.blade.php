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

    <div class="section flex flex-col items-center gap-14">
        <div class="flex flex-row justify-center items-center custom-color">
            <x-heading-h1><span>Trusted by Industry Professionals</span></x-heading-h1>
        </div>

        <!-- hugging client -->
        <div class="flex flex-row justify-center items-center gap-18" style="aspect-ratio: 1312/48;">
            <img src="{{ asset('images/client/1.png') }}" alt="client 1" />
            <img src="{{ asset('images/client/2.png') }}" alt="client 2" />
            <img src="{{ asset('images/client/3.png') }}" alt="client 3" />
            <img src="{{ asset('images/client/4.png') }}" alt="client 4" />
            <img src="{{ asset('images/client/5.png') }}" alt="client 5" />
            <img src="{{ asset('images/client/6.png') }}" alt="client 6" />
            <img src="{{ asset('images/client/7.png') }}" alt="client 7" />
            <img src="{{ asset('images/client/8.png') }}" alt="client 8" />
        </div>
    </div>

    <div class="relative">
        <img src="{{ asset('images/elipse-6.svg') }}" alt="decorative background"
            class="absolute left-0 top-0 w-full pointer-events-none select-none" style="z-index:-1;">
        @include('components.section-inquiry')

        @include('components.faq-section')
    </div>

    <!-- Latest News Section -->
    <x-latest-news-section :max-news-items="3" />

@endsection