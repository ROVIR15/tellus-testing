@extends('layouts.app')

@section('title', 'Component Experimentation')
@section('description', 'Experimentation page for testing component slicing and development')

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

<div class="container flex flex-col gap-10">
    <!-- 3 column x 3 row grid -->
    <div class="grid grid-cols-3 gap-8">
        @foreach($why_choose_us as $item)
            <div class="relative flex flex-col items-start gap-4 h-[210px] w-full text-white overflow-hidden rounded-3xl p-6"
                style="background-color: #76B2E8;">
                <!-- Third Layer: Image -->
                <img class="absolute bottom-0 right-0 hidden lg:block z-0"
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

    <!-- 4 column x 1 row grid -->
    <div class="grid grid-cols-4 gap-4">
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