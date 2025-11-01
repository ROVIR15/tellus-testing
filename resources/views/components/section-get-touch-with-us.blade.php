<x-section-top-padding class="pt-48 sm:pt-48 lg:pt-48">
    <div class="flex flex-col text-center mb-16 gap-10">
        <x-heading-display-3 class="font-small" style="
                color: var(--color-secondary-300);
            ">
            Get in Touch With Us
        </x-heading-display-3>
        <x-heading-h4>
            Partner with a lab that understands the stakes. Fast turnaround. Certified methods. Real precision
        </x-heading-h4>
    </div>
</x-section-top-padding>

<x-section style="padding: 0;">
    <!-- Two Column Layout: Image and Content -->
    <div class="grid gap-8 items-stretch">
        <div class="contact-us-form flex flex-col justify-center mx-auto">

            <!-- Inquiry form -->
            <form method="POST" action="#" class="space-y-6">
                @csrf

                <!-- Your Name -->
                <x-form-input label="Your Name" placeholder="Enter your full name" name="name" size="medium" required />

                <!-- Your Email -->
                <x-form-input label="Your Email" placeholder="your@email.com" name="email" type="email" size="medium"
                    required />

                <!-- Company Name -->
                <x-form-input label="Company Name" placeholder="Enter your company name" name="company_name"
                    size="medium" required />

                <!-- Company Website -->
                <x-form-input label="Company Website" placeholder="https://example.com" name="company_website"
                    type="url" size="medium" />

                <!-- Tell Us Your Project -->
                <x-form-input label="Tell Us Your Project" placeholder="Describe your project and requirements"
                    name="project_description" multirow="true" rows="5" size="medium" required />

                <!-- Submit Button -->
                <div class="pt-4">
                    <x-button variant="accent" size="lg" class="w-full">
                        Submit Inquiry
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-section>