@extends('layouts.app')

@section('title', 'Frequently Asked Questions')
@section('description', 'Find answers to common questions about our testing services, methodologies, and processes.')

@section('content')
    <div class="relative">
        <img src="{{ asset('images/decorative-about-us/circle-center.svg') }}" alt="Decorative element"
            class="absolute w-full -z-10 hidden md:block">

        <img src="{{ asset('images/mobile-elipse-faq-decorative.png') }}" alt="Decorative element"
            class="absolute w-full -z-10 block md:hidden">
        <!-- Main FAQ section using the existing component -->
        <x-section-main-faq :items="$items" />

        <x-section-inquiry />
    </div>
@endsection