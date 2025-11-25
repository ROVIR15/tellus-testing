{{-- Inquiry Section Component --}}
<x-section style="background: linear-gradient(180deg, #EBF5FF 0%, #E7DFEA 100%);">
    <!-- Two Column Grid Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-stretch min-h-[800px]">

        <!-- Left Column: Image (60% width on desktop) -->
        <div class="lg:col-span-3 hidden lg:flex lg:items-center lg:justify-center">
            <img src="{{ asset('/images/inquiry-image.png') }}" alt="Laboratory Testing"
                class="w-full h-auto object-contain rounded-lg" />
        </div>

        <!-- Right Column: Form (40% width on desktop) -->
        <div class="lg:col-span-2 flex flex-col">
            <!-- Form Container with Gradient Background -->
            <div class="flex flex-col h-full p-8 lg:p-12 rounded-2xl" style="
                background: linear-gradient(180deg, rgba(0, 106, 204, 0.2) 0%, rgba(244, 144, 244, 0.2) 100%);
                backdrop-filter: blur(28px);
            ">
                <!-- Header -->
                <div class="mb-8">
                    <x-heading-h1 class="mb-4" style="color: var(--color-secondary-300);">
                        Ready to Get Reliable <br /> Test Results?
                    </x-heading-h1>
                    <x-body-1 class="text-neutral-700">
                        Partner with a lab that understands the stakes. Fast turnaround. Certified methods. Real
                        precision.
                    </x-body-1>
                </div>

                <!-- Inquiry Form -->
                <form method="POST" action="#" class="flex-1 flex flex-col space-y-4">
                    @csrf

                    <!-- Your Name -->
                    <x-form-input label="Your Name" placeholder="Enter your full name" name="name" size="medium"
                        required />

                    <!-- Your Email -->
                    <x-form-input label="Your Email" placeholder="your@email.com" name="email" type="email"
                        size="medium" required />

                    <!-- Company Name -->
                    <x-form-input label="Company Name" placeholder="Enter your company name" name="company_name"
                        size="medium" required />

                    <!-- Company Website -->
                    <x-form-input label="Company Website" placeholder="https://example.com" name="company_website"
                        type="url" size="medium" />

                    <!-- Tell Us Your Project -->
                    <x-form-input label="Tell Us Your Project" placeholder="Describe your project and requirements"
                        name="project_description" multirow="true" rows="4" size="medium" required />

                    <!-- Submit Button -->
                    <div class="pt-4 mt-auto">
                        <x-button variant="accent" size="lg" class="w-full">
                            Submit Inquiry
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-section>