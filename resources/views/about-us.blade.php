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
    ];

    $qualityCardsSlicedFirstThree = array_slice($qualityCards, 0, 3);
    $qualityCardsSlicedLast = array_slice($qualityCards, 3);
@endphp

@php
    $why_choose_us = [
        [
            'decoratiove_url' => '/about/why-choose-us/1.png',
            'title' => 'Independent & Accredited: unbiased testing with full traceability',
        ],
        [
            'decoratiove_url' => '/about/why-choose-us/2.png',
            'title' => 'Modern Equipment: high-precision instruments',
        ],
        [
            'decoratiove_url' => '/about/why-choose-us/3.png',
            'title' => 'Fast Turnaround: standard and expedited testing available',
        ],
        [
            'decoratiove_url' => '/about/why-choose-us/4.png',
            'title' => 'Detailed Reporting: clear, standards-based documentation',
        ],
        [
            'decoratiove_url' => '/about/why-choose-us/5.png',
            'title' => 'Client Support: dedicated support and customized consultation',
        ],
        [
            'decoratiove_url' => '/about/why-choose-us/6.png',
            'title' => 'Competitive pricing & customization available',
        ]
    ];

    $accreditations = [
        [
            'title' => 'ISO/IEC 17025 Certified',
            'description' => 'Ensures global test accuracy',
            'url' => '/about/accreditation/1.png',
        ],
        [
            'title' => 'ILAC MRA Recognized',
            'description' => 'Accepted worldwide',
            'url' => '/about/accreditation/2.png',
        ],
        [
            'title' => '16+ Accredited Methods',
            'description' => 'Covering PVD & Geotextile',
            'url' => '/about/accreditation/3.png',
        ],
        [
            'title' => 'Verify Accreditation',
            'description' => 'You can verify our accreditation from Department of Standards Malaysia (DSM)',
            'url' => '/about/accreditation/4.png',
        ]
    ]
@endphp


@extends('layouts.app')

@section('title', 'About Us - Tellus Testing')
@section('description', 'Learn about Tellus Testing, our mission, values, and the team behind our quality testing services.')

@section('content')
    <div class="relative">
        <img src="{{ asset('images/decorative-about-us/union-3.svg') }}" alt="Decorative element"
            class="absolute top-[5%] left-0 w-[70%] md:w-[50%] h-auto -z-10">
        <img src="{{ asset('images/decorative-about-us/union-1.svg') }}" alt="Decorative element"
            class="absolute -top-10 -right-0 w-[80%] md:w-[60%] h-auto -z-10">
        <div class="section-top-padding px-8 md:px-16 pb-0 md:pb-20">
            <div class="flex flex-col md:flex-row items-center justify-center gap-12">
                <div class="flex flex-col gap-6 md:w-3/8">
                    <x-heading-display-3 style="color: var(--color-secondary-300)">
                        About Us
                    </x-heading-display-3>
                    <x-subheading-1 style="color: var(--color-secondary-300)">
                        Tellus Testing has a full range of state-of-the-art equipment to conduct professional testing and
                        inspection
                        of geosynthetic materials.
                    </x-subheading-1>
                </div>

                <div class="md:w-5/8">
                    <img src="{{ asset('images/about-us.png') }}" alt="About Us"
                        class="w-full md:h-auto max-w-full h-[513px] rounded-3xl object-cover" placeholder="blur">
                </div>
            </div>
        </div>
    </div>

    <div class="relative">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 py-10 md:py-14 px-8">
            <img src="{{ asset('images/tellus-team.jpg') }}" alt="Team Photo"
                class="w-full h-auto max-w-full object-cover rounded-3xl" placeholder="blur">

            <div class="flex flex-col gap-6">
                <x-heading-h2 style="color: var(--color-secondary-300)">
                    Our team consists of highly skilled technicians & experienced professionals that provide reliable data
                    quality, and efficient services for competitive prices.
                </x-heading-h2>

                <x-subheading-2 style="color: var(--color-secondary-300)">
                    Our testing services include a full scope of geosynthetic tests that determine physical, mechanical,
                    hydraulic properties in accordance with ISO and ASTM standards to ensure that those materials that are
                    used
                    for ground improvement projects meet the specified quality standards.
                </x-subheading-2>
            </div>
        </div>

        <img src="{{ asset('images/decorative-about-us/union-2.svg') }}" alt="Ellipse 8.svg"
            class="absolute top-0 left-0 w-full h-full">

        <div class="flex flex-col gap-8 py-10 md:py-14 px-8">
            <x-heading-h1 class="custom-color">
                Why Choose Tellus Testing?
            </x-heading-h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($why_choose_us as $item)
                    <div class="relative flex flex-col items-start gap-4 h-[210px] w-full text-white overflow-hidden rounded-3xl p-6"
                        style="background-color: #76B2E8;">
                        <!-- Third Layer: Image -->
                        <img class="absolute bottom-0 right-0 md:hidden lg:block z-0"
                            src="{{ asset('/images' . $item['decoratiove_url']) }}" alt="{{ $item['title'] }}" />

                        <div class="absolute inset-0 z-5" style="background: #006ACC; opacity: 0.85;"></div>

                        <!-- Second Layer: Gradient -->
                        <div class="absolute inset-0 z-10" style="
                                        background: radial-gradient(150% 20% at 32% 0%, #76B2E8 0%, transparent 100%) /* warning: gradient uses a rotation that is not supported by CSS and may not behave as expected */;
                                    "></div>

                        <div class="absolute inset-0 z-11" style="
                                        background: radial-gradient(150% 60% at 32% 0%, #76B2E8 0%, transparent 100%) /* warning: gradient uses a rotation that is not supported by CSS and may not behave as expected */;
                                    "></div>

                        <!-- First Layer: Text -->
                        <span class="relative z-20 w-3/5 text-left heading-5">{{ $item['title'] }}</span>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    </div>

    <div class="flex flex-col gap-8 py-10 md:py-14 px-8"
        style="background: linear-gradient(180deg, rgba(255, 255, 255, 0) 6.77%, #EBF5FF 72.99%);">
        <x-heading-h1 class="custom-color">
            Quality Policy
        </x-heading-h1>


        <div class="flex flex-wrap justify-center gap-8 md:gap-12">
            @foreach($qualityCards as $item)
                <!-- card -->
                <div class="test-detail-card pink-border transition-all duration-300 ease-in-out rounded-2xl border border-solid p-6 md:p-8 flex flex-col gap-6 h-full w-full md:w-[calc((100%-6rem)/3)]"
                    style="aspect-ratio: 421/220; background: #FFFFFF4D;">
                    <div class="flex flex-col gap-6 justify-between items-end h-full">
                        <span class="heading-6" style="color: var(--color-secondary-300);">
                            {{ $item['label'] }}
                        </span>

                        <img src="{{ $item['icon'] }}" alt="{{ $item['label'] }}"
                            class="w-12 md:w-14 h-12 md:h-14 object-contain flex-shrink-0" placeholder="blur"
                            style="aspect-ratio: 62/53">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex flex-col gap-8 py-10 md:py-14 px-8" style="background: #EBF5FF">
        <x-heading-h1 class="custom-color">
            Accreditation
        </x-heading-h1>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @foreach ($accreditations as $item)
                <div class="relative text-white h-[317px] rounded-2xl p-6" style="
                                    ratio-scale: 1/1;
                                    background: linear-gradient(180deg, #660A66 0%, #B21BB2 100%);
                                ">
                    <div class="flex flex-col">
                        <span
                            style="font-size: 20px; font-weight: 600; color: var(--Secondary-100, #FDEDFD);">{{ $item['title'] }}</span>
                        <span style="font-size: 16px; color: var(--Secondary-100, #FDEDFD);">{{ $item['description'] }}</span>
                    </div>
                    <img class="absolute right-0 bottom-0" src="{{ asset('/images' . $item['url']) }}"
                        alt="{{ $item['title'] }}" />
                </div>
            @endforeach
        </div>
    </div>

    <x-section-inquiry />
@endsection