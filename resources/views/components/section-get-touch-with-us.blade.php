<x-section-top-padding class="pt-48 sm:pt-48 lg:pt-48 px-4 md:px-16">
    <div class="flex flex-col text-start md:text-center mb-16 gap-10">
        <x-heading-display-3 class="font-small" style="
                color: var(--color-secondary-300);
            ">
            Get in Touch With Us
        </x-heading-display-3>
        <x-heading-h4 style="color: var(--color-secondary-300);">
            We’d love to hear from you — whether you have a question, need support, or just want to say hello.
        </x-heading-h4>
    </div>
</x-section-top-padding>

<x-section style="padding: 0;">
    <!-- Two Column Layout: Image and Content -->
    <div class="grid gap-8 items-stretch">
        <div class="contact-us-form flex flex-col justify-center mx-auto">

            <!-- Inquiry form -->
            <form method="POST" action="{{ route('inquiries.store') }}" class="space-y-6">
                @csrf

                <x-form-input label="Name" placeholder="Type here" name="first_name" size="medium" required />
                <x-form-input label="Surname" placeholder="Type here" name="last_name" size="medium" />
                <x-form-input label="Company Name" placeholder="Type here" name="company_name" size="medium" required />
                <x-form-input label="Company Country" placeholder="Type here" name="company_country" size="medium" required />
                <x-form-input label="Company City" placeholder="Type here" name="company_city" size="medium" required />
                <x-form-input label="Company Address" placeholder="Type here" name="company_address" size="medium" required />
                <x-form-input label="ZIP" placeholder="Type here" name="zip" size="medium" required />

                <div class="grid grid-cols-3 gap-3">
                    <div>
                        <label class="body-2 block mb-2">Phone Number</label>
                        <div class="flex gap-2">
                            <select name="phone_country_code" class="input-field w-24" required>
                                <option value="+61">+61</option>
                                <option value="+62">+62</option>
                                <option value="+65">+65</option>
                                <option value="+1">+1</option>
                                <option value="+44">+44</option>
                            </select>
                            <input type="text" name="phone_number" class="input-field flex-1" placeholder="Type here" required />
                        </div>
                    </div>
                </div>

                <x-form-input label="Email" placeholder="Type here" name="email" type="email" size="medium" required />
                <x-form-input label="How can we help?" placeholder="Type here" name="message" multirow="true" rows="5" size="medium" required />

                <!-- Submit Button -->
                <div class="pt-4">
                    <x-button variant="accent" size="lg" class="w-full">
                        Submit Inquiry
                    </x-button>
                </div>
            </form>
            @if(session('success'))
                <div class="mt-4 p-3 rounded-lg" style="background-color: var(--color-primary-100); color: var(--color-primary-300);">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</x-section>