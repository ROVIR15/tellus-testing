@php
    $color = "color: var(--color-secondary-300);";
@endphp
<div class="flex flex-col gap-24 mx-auto">
    <!-- Heading -->
    <div class="flex flex-row gap-18 items-center px-8">
        <div class="flex flex-col w-1/2 mb-12 gap-8">
            <x-heading-display-3 :style="$color">
                Application Procedure
            </x-heading-display-3>
            <x-heading-h4 :style="$color">
                Follow these simple steps to complete your application process.
            </x-heading-h4>
            <x-body-1 :style="$color">
                Submit the required documents, provide your samples, and receive confirmation—all in a few easy steps.
                Make sure to prepare all necessary information before starting to ensure a smooth and efficient
                submission.
            </x-body-1>
        </div>
        <div class="w-1/2">
            <x-application-submission-wizard />
        </div>
    </div>

    <x-section-inquiry />
</div>