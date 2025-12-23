@extends('layouts.app')

@section('title', 'Contact Us - Tellus Testing')
@section('description', 'Get in touch with Tellus Testing for inquiries about our testing services, quotes, or general information.')

@section('content')
<div class="relative">
    <!-- SVG Background -->
    <div class="absolute md:block hidden inset-0 overflow-hidden z-0 pointer-events-none">
        <svg width="100%" height="100%" viewBox="0 0 1440 1281" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"> 
            <g filter="url(#filter0_f_1720_6839)"> 
                <path d="M1423.63 -46C2018.55 603.297 1214.05 1273 690.371 1273C166.689 1273 -448.894 928.037 -16.8747 -46.5C-16.8747 -355.476 450.013 -381 703.876 -381C957.739 -381 1423.63 -354.976 1423.63 -46Z" fill="url(#paint0_linear_1720_6839)" fill-opacity="0.08"/> 
            </g> 
            <defs> 
                <filter id="filter0_f_1720_6839" x="-262.682" y="-481" width="1996.36" height="1854" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"> 
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/> 
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/> 
                    <feGaussianBlur stdDeviation="50" result="effect1_foregroundBlur_1720_6839"/> 
                </filter> 
                <linearGradient id="paint0_linear_1720_6839" x1="2313.84" y1="-147.857" x2="2059.73" y2="1105.87" gradientUnits="userSpaceOnUse"> 
                    <stop stop-color="#384BA0"/> 
                    <stop offset="0.44" stop-color="#652266"/> 
                    <stop offset="0.61" stop-color="#53337C"/> 
                    <stop offset="0.86" stop-color="#3B4B99"/> 
                    <stop offset="1" stop-color="#3354A5"/> 
                </linearGradient> 
            </defs> 
        </svg>
    </div>

    <img 
        src="{{ asset('images/mobile-elipse-get-in-touch-decorative.png') }}" 
        alt="Mobile Elipse Get in Touch Decorative" 
        class="absolute w-full inset-0 overflow-hidden z-0 block md:hidden"
    >
    
    <!-- Content -->
    <div class="relative z-10">
        <x-section-get-touch-with-us />
    </div>
</div>
@endsection