@extends('layouts.app')

@section('title', 'Testing & Inspection Services')
@section('description', 'Professional testing and inspection services for construction, engineering, and infrastructure projects.')

@section('content')
    <div class="relative">
        <img src="{{ asset('images/union.png') }}" alt="decorative background"
            class="absolute right-0 top-0 -z-10 pointer-events-none select-none" style="z-index:-1;">


        <!-- Main content with responsive margin -->
        <x-section-test-details />
    </div>
    <x-section-inquiry />
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
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
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