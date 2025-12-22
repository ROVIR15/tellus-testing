@extends('layouts.app')

@section('title', 'Application Procedure')
@section('description', 'Follow these simple steps to complete your application process.')

@section('content')
    <div class="relative flex flex-col gap-10">
        <img src="{{ asset('images/decorative-about-us/union-1.svg') }}" alt="Decorative element"
            class="absolute top-[10%] right-0 md:-top-10 md:-right-0 w-[80%] md:w-[60%] h-auto -z-10">

        <!-- Main content with responsive margin -->
        <x-section-top-padding>
            <x-section-application />
        </x-section-top-padding>

        <x-section-inquiry />
    </div>
@endsection

<!-- Custom CSS for this page -->
<style>
    /* Process timeline animations */
    .process-step {
        transition: all 0.3s ease-in-out;
    }

    .process-step:hover {
        transform: translateY(-5px);
    }

    /* Service card hover effects */
    .service-card {
        transition: all 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5nvpx rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Gradient text effect */
    .gradient-text {
        background: linear-gradient(90deg, #2D6BB4 0%, #652266 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        display: inline;
    }
</style>