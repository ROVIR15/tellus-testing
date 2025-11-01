@extends('layouts.app')

@section('title', 'Component Experimentation')
@section('description', 'Experimentation page for testing component slicing and development')

@php
    use App\Constants\FAQConstants;
    $faqItems = FAQConstants::getItems();
@endphp

<!-- Experimentation Section -->

<!-- Test Details Section -->
<x-news-card-1 :images="[]" status="Experiment" :created_at="strtotime('2024-06-15 10:00:00')" href="#">
    Experimentation with new component structure and layout.
</x-news-card-1>

<x-news-card-2 :images="[]" status="Experiment" :created_at="strtotime('2024-06-15 10:00:00')">
    Experimentation with new component structure and layout.
</x-news-card-2>

<x-news-card-3 :images="['https://example.com/image2.jpg']" status="Featured" :created_at="1726310400" href="/news/2">
    New Soil Analysis Techniques Show Promise
</x-news-card-3>

