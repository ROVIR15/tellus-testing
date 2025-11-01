@extends('layouts.app')

@section('title', 'About Us - Tellus Testing')
@section('description', 'Learn about Tellus Testing, our mission, values, and the team behind our quality testing services.')

@section('content')
    <div class="max-w-4xl mt-48 md:mt-48 lg:mt-48 sm:mt-48 mx-auto">
        <div class="text-center mb-16">
            <x-heading-h1 style="
                background: linear-gradient(180deg, #2D6BB4 0%, #2F68B1 28%, #355FA7 49%, #415097 68%, #513B81 85%, #652266 100%);
                -webkit-background-clip: text; /* Safari/Chrome */
                background-clip: text;         /* Modern browsers */
                color: transparent;            /* Hide solid color to reveal gradient */
            ">
                Frequently Asked Questions
            </x-heading-h1>
            <x-subheading-2>
                Got a question? We've got you covered.
            </x-subheading-2>
        </div>
    </div>
@endsection