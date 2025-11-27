{{-- Inquiry Section Component --}}
<x-section id="inquiry" style="background: linear-gradient(180deg, #EBF5FF 0%, #E7DFEA 100%);">
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
                <form method="POST" action="{{ route('inquiries.store') }}" class="flex-1 flex flex-col space-y-4" id="inquiry-mini-form">
                    @csrf

                    <x-form-input label="Your Name" placeholder="Enter your full name" name="name" size="medium" required />

                    <!-- Your Email -->
                    <x-form-input label="Your Email" placeholder="your@email.com" name="email" type="email"
                        size="medium" required />

                    <!-- Company Name -->
                    <x-form-input label="Company Name" placeholder="Enter your company name" name="company_name"
                        size="medium" required />

                    <x-form-input label="Company Website" placeholder="https://example.com" name="company_website" type="url" size="medium" />

                    <x-form-input label="Tell Us Your Project" placeholder="Describe your project and requirements" name="message" multirow="true" rows="4" size="medium" required />

                    <input type="hidden" name="first_name" id="mini_first_name" value="" />
                    <input type="hidden" name="last_name" id="mini_last_name" value="" />
                    <input type="hidden" name="company_country" value="N/A" />
                    <input type="hidden" name="company_city" value="N/A" />
                    <input type="hidden" name="company_address" value="N/A" />
                    <input type="hidden" name="zip" value="N/A" />
                    <input type="hidden" name="phone_country_code" value="+62" />
                    <input type="hidden" name="phone_number" value="N/A" />

                    <!-- Submit Button -->
                    <div class="pt-4 mt-auto">
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
                <script>
                  document.addEventListener('DOMContentLoaded', function () {
                    var form = document.getElementById('inquiry-mini-form');
                    if (!form) return;
                    form.addEventListener('submit', function () {
                      var nameInput = form.querySelector('input[name="name"]');
                      var first = document.getElementById('mini_first_name');
                      var last = document.getElementById('mini_last_name');
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
    </div>
</x-section>
