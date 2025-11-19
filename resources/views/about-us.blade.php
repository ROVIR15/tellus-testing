@php
    $cardTest = [
        [
            'icon' => '/images/icons/why-choose/1.svg',
            'label' => 'Independent & Accredited: unbiased testing with full traceability',
        ],
        [
            'icon' => '/images/icons/why-choose/2.svg',
            'label' => 'Modern Equipment: high-precision instruments',
        ],
        [
            'icon' => '/images/icons/why-choose/3.svg',
            'label' => 'Fast Turnaround: standard and expedited testing available',
        ],
        [
            'icon' => '/images/icons/why-choose/4.svg',
            'label' => 'Detailed Reporting: clear, standards-based documentation',
        ],
        [
            'icon' => '/images/icons/why-choose/5.svg',
            'label' => 'Client Support: dedicated support and customized consultation',
        ],
        [
            'icon' => '/images/icons/why-choose/6.svg',
            'label' => 'Competitive pricing & customization available',
        ],
    ];

    $qualityCards = [
        [
            'icon' => '/images/icons/quality/1.png',
            'label' => 'To provide high quality test results and excellent professional service to our customers.',
        ],
        [
            'icon' => '/images/icons/quality/2.png',
            'label' => 'To understand the needs and expectations of internal and external interested parties that are relevant to our Quality Management System.',
        ],
        [
            'icon' => '/images/icons/quality/3.png',
            'label' => 'To ensure impartiality, transparency and independence in all our activities without association with any parties.',
        ],
        [
            'icon' => '/images/icons/quality/4.png',
            'label' => 'To continuously improve the skills & competences of the laboratory personnel.',
        ],
        [
            'icon' => '/images/icons/quality/5.png',
            'label' => 'To continuously improve the effectiveness of our Quality Management System according to ISO 9001:2015',
        ],
    ];

    $accrediationCards = [
        [
            'icon' => '/images/icons/accreditation/1.svg',
            'label' => 'ISO 9001:2015',
            'description' => 'International Standard for Quality Management Systems',
        ],
        [
            'icon' => '/images/icons/accreditation/2.svg',
            'label' => 'ISO 13485:2016',
            'description' => 'International Standard for Medical Device Quality',
        ],
        [
            'icon' => '/images/icons/accreditation/3.svg',
            'label' => 'ISO 27001:2013',
            'description' => 'International Standard for Information Security Management Systems',
        ],
        [
            'icon' => '/images/icons/accreditation/4.svg',
            'label' => 'ISO 22000:2018',
            'description' => 'International Standard for Health Care Services',
        ],
    ]
@endphp

@extends('layouts.app')

@section('title', 'About Us - Tellus Testing')
@section('description', 'Learn about Tellus Testing, our mission, values, and the team behind our quality testing services.')

@section('content')
    <div class="relative">
        <img src="{{ asset('images/decorative-about-us/union-3.svg') }}" alt="Decorative element"
            class="absolute top-[5%] left-0 w-[50%] h-auto -z-10">
        <img src="{{ asset('images/decorative-about-us/union-1.svg') }}" alt="Decorative element"
            class="absolute -top-10 -right-10 w-[60%] h-auto -z-10">
        <div class="section-top-padding px-8 pb-20">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center justify-center gap-12">
                <div class="flex flex-col gap-6">
                    <x-heading-display-3 style="color: var(--color-secondary-300)">
                        About Us
                    </x-heading-display-3>
                    <x-subheading-1 style="color: var(--color-secondary-300)">
                        Tellus Testing has a full range of state-of-the-art equipment to conduct professional testing and
                        inspection
                        of geosynthetic materials.
                    </x-subheading-1>
                </div>

                <div>
                    <img src="{{ asset('images/about-us.png') }}" alt="About Us" class="w-full h-auto" placeholder="blur">
                </div>
            </div>
        </div>
    </div>

    <div class="relative">
        <div class="flex flex-col gap-8 py-14 px-8">
            <x-heading-h1 style="color: var(--color-secondary-300)">
                Our team consists of highly skilled technicians & experienced professionals that provide reliable data
                quality, and efficient services for competitive prices.
            </x-heading-h1>

            <x-subheading-2 style="color: var(--color-secondary-300)">
                Our team consists of highly skilled technicians & experienced professionals that provide reliable data
                quality, and efficient services for competitive prices.
            </x-subheading-2>

            <img src="{{ asset('images/tellus-team.jpg') }}" alt="About Us" class="w-full h-auto" placeholder="blur">
        </div>

        <img src="{{ asset('images/decorative-about-us/union-2.svg') }}" alt="Ellipse 8.svg"
            class="absolute top-0 left-0 w-full h-full">

        <div class="flex flex-col gap-8 py-14 px-8">
            <x-heading-h1 class="custom-color">
                Why Choose Tellus Testing?
            </x-heading-h1>

            <div class="grid grid-cols-1 md:grid-cols-2 items-stretch justify-center gap-8 md:gap-12">
                @foreach($cardTest as $item)
                    <!-- card -->
                    <div
                        class="test-detail-card p-6 pink-border transition-all duration-300 ease-in-out rounded-2xl border border-solid p-6 md:p-8 flex flex-col gap-6 h-full">
                        <div class="flex flex-row gap-6 items-center justify-start gap-4">
                            <img src="{{ $item['icon'] }}" alt="{{ $item['label'] }}" placeholder="blur"
                                class="w-20 h-20 object-contain flex-shrink-0" style="aspect-ratio: 82/88;">
                            <x-heading-h4>
                                {{ $item['label'] }}
                            </x-heading-h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

    <div class="flex flex-col gap-8 py-14 px-8"
        style="background: linear-gradient(180deg, rgba(255, 255, 255, 0) 6.77%, #EBF5FF 72.99%);">
        <x-heading-h1 class="custom-color">
            Quality Policy
        </x-heading-h1>

        <div class="grid grid-cols-1 md:grid-cols-3 items-stretch justify-center gap-8 md:gap-12">
            @foreach($qualityCards as $item)
                <!-- card -->
                <div class="test-detail-card pink-border transition-all duration-300 ease-in-out rounded-2xl border border-solid p-6 md:p-8 flex flex-col gap-6 h-full"
                    style="aspect-ratio: 421/323; background: #FFFFFF4D;">
                    <div class="flex flex-col gap-6 items-start justify-start gap-4">
                        <img src="{{ $item['icon'] }}" alt="{{ $item['label'] }}" class="w-14 h-14 object-contain flex-shrink-0"
                            placeholder="blur" style="aspect-ratio: 62/53">
                        <x-heading-h4 style="color: var(--color-secondary-300);">
                            {{ $item['label'] }}
                        </x-heading-h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex flex-col gap-8 py-14 px-8" style="background: #EBF5FF">
        <x-heading-h1 class="custom-color">
            Accreditation
        </x-heading-h1>

        <div class="grid grid-cols-1 md:grid-cols-2 items-stretch justify-center gap-8 md:gap-12">
            @foreach($accrediationCards as $item)
                <!-- card -->
                <div class="test-detail-card pink-border transition-all duration-300 ease-in-out rounded-2xl border border-solid p-6 md:p-8 flex flex-col gap-6 h-full"
                    style="background: #ffffff4d;">
                    <div class="flex flex-col gap-6 items-center justify-start gap-4">
                        <img src="{{ $item['icon'] }}" alt="{{ $item['label'] }}" class="w-[30%] h-[30%]" placeholder="blur">
                        <div class="flex flex-col text-center gap-3.5">
                            <x-heading-h4 style="color: #006ACC">
                                {{ $item['label'] }}
                            </x-heading-h4>
                            <p class="body-1" style="color: #006ACC">
                                {{ $item['description'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <x-section-inquiry />
@endsection