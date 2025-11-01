@extends('layouts.app')

@section('title', 'Testing & Inspection Services')
@section('description', 'Professional testing and inspection services for construction, engineering, and infrastructure projects.')

@section('content')
    <div class="relative px-8">
        <!-- Background gradient -->
        <div class="absolute inset-0 overflow-hidden z-0 pointer-events-none">
            <svg width="100%" height="100%" viewBox="0 0 1440 800" fill="none" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="xMidYMid slice">
                <g opacity="0.3" filter="url(#filter0_f_1427_19817)">
                    <path
                        d="M1547.26 -426.153C1547.26 -426.153 1420.52 -156.834 1254.37 -156.834C1088.22 -156.834 1088.22 -426.153 922.066 -426.153C755.914 -426.153 755.914 -156.834 589.762 -156.834C423.61 -156.834 423.61 -426.153 257.458 -426.153C91.3057 -426.153 91.3057 -156.834 -74.8466 -156.834C-241 -156.834 -241 -426.153 -407.152 -426.153"
                        stroke="url(#paint0_linear_1427_19817)" stroke-width="400" stroke-linecap="round" />
                </g>
                <defs>
                    <filter id="filter0_f_1427_19817" x="-757.152" y="-826.153" width="2654.41" height="1069.32"
                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                        <feGaussianBlur stdDeviation="150" result="effect1_foregroundBlur_1427_19817" />
                    </filter>
                    <linearGradient id="paint0_linear_1427_19817" x1="-407.152" y1="-426.153" x2="1547.26" y2="-426.153"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#2D6BB4" />
                        <stop offset="0.276042" stop-color="#2F68B1" />
                        <stop offset="0.494792" stop-color="#355FA7" />
                        <stop offset="0.682292" stop-color="#415097" />
                        <stop offset="0.848958" stop-color="#513B81" />
                        <stop offset="1" stop-color="#652266" />
                    </linearGradient>
                </defs>
            </svg>
        </div>

        <!-- Main content with responsive margin -->
        <div class="relative z-10 pt-16 md:pt-20 lg:pt-24">
            <!-- Hero Section -->
            <x-section class="mb-16">
                <div class="max-w-5xl mx-auto text-center">
                    <x-heading-h1 class="mb-6">Testing & Inspection Services</x-heading-h1>
                    <x-body-1 class="mb-8 max-w-3xl mx-auto">
                        Our comprehensive testing and inspection services ensure your projects meet all quality standards
                        and regulatory requirements. With state-of-the-art equipment and experienced professionals, we
                        deliver accurate results you can trust.
                    </x-body-1>
                    <div class="flex flex-wrap justify-center gap-4">
                        <x-button variant="primary" size="lg">
                            Request a Service
                        </x-button>
                        <x-button variant="secondary" size="lg">
                            View Our Certifications
                        </x-button>
                    </div>
                </div>
            </x-section>


            <x-section-test-details />
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