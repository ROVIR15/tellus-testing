<x-section-top-padding class="pt-48 sm:pt-48 lg:pt-48 px-8 md:px-16">
    <div class="flex flex-col text-start md:text-center mb-16 gap-10">
        <x-heading-display-3 class="font-small" style="
                color: var(--color-secondary-300);
            ">
            Get in Touch With Us
        </x-heading-display-3>
        <x-heading-h4 style="color: var(--color-secondary-300);">
            We’d love to hear from you, whether you have a question, need support, or just want to say hello.
        </x-heading-h4>
    </div>
</x-section-top-padding>

<x-section style="padding: 0;">
    <!-- Two Column Layout: Image and Content -->
    <div class="grid gap-8 items-stretch">
        <div class="contact-us-form flex flex-col justify-center mx-auto px-8 md:px-16">

            <!-- Inquiry form -->
            <form method="POST" action="{{ route('inquiries.store') }}" class="space-y-6" id="contact-us-form">
                @csrf

                <x-form-input label="Your Name" placeholder="Enter your full name" name="name" size="medium" required />
                <x-form-input label="Your Email" placeholder="your@email.com" name="email" type="email" size="medium" required />
                <x-form-input label="Company Name" placeholder="Enter your company name" name="company_name" size="medium" required />
                <x-form-input label="Company Website" placeholder="https://example.com" name="company_website" type="url" size="medium" />
                <x-form-input label="Tell Us Your Project" placeholder="Describe your project and requirements" name="message" multirow="true" rows="5" size="medium" required />

                <input type="hidden" name="first_name" id="contact_first_name" value="" />
                <input type="hidden" name="last_name" id="contact_last_name" value="" />

                <!-- Submit Button -->
                <div class="pt-4">
                    <x-button variant="accent" size="lg" class="w-full">
                        Submit Inquiry
                    </x-button>
                </div>
            </form>
            @if(session('success'))
                <div class="mt-4 p-3 rounded-lg"
                    style="background-color: var(--color-primary-100); color: var(--color-primary-300);">
                    {{ session('success') }}
                </div>
            @endif
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var form = document.getElementById('contact-us-form');
                    if (!form) return;
                    form.addEventListener('submit', function () {
                        var nameInput = form.querySelector('input[name="name"]');
                        var first = document.getElementById('contact_first_name');
                        var last = document.getElementById('contact_last_name');
                        var name = (nameInput && nameInput.value || '').trim();
                        if (name.length === 0) { first.value = ''; last.value = ''; return; }
                        var parts = name.split(/\s+/);
                        first.value = parts.shift();
                        last.value = parts.length ? parts.join(' ') : '';
                    });
                });
            </script>
        </div>
    </div>
</x-section>