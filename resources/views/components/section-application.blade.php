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
                We will follow up on your enquiry and guide you through the steps with regards to the sample
                requirements,
                turnaround time as well as costs and payment instructions.
                You can also fill out our contact form.
                At Tellus Testing, we prefer to guide you through the steps personally to ensure you receive the test
                report you
                need.
            </x-body-1>
        </div>
        <div class="w-1/2">
            <x-application-submission-wizard />
        </div>
    </div>

    <x-section-inquiry />
</div>