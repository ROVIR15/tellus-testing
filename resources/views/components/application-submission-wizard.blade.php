<div x-data="{ 
        step: 1, 
        total: 2, 
        next(){ if(this.step < this.total) this.step++ }, 
        prev(){ if(this.step > 1) this.step-- } 
    }" class="relative" aria-label="Application Submission Wizard">
    <div class="flex justify-start gap-6 mb-3">
        <x-heading-h4 x-text="`${step}. ${step === 1 ? 'Submission' : 'Test Report Issuance'}`"></x-heading-h4>
        <button type="button" @click="step < total ? next() : prev()"
            class="application-navigation-btn inline-flex items-center gap-2 px-4 py-2 rounded-full shadow-sm subheading-3"
            style="background: var(--Primary-100, #EBF5FF);color: var(--color-primary-300);"
            :aria-label="step < total ? 'Go to next step' : 'Go to previous step'">
            <span x-text="step < total ? 'Next' : 'Previous'"></span>
            <span aria-hidden="true" x-text="step < total ? '→' : '←'"></span>
        </button>
    </div>

    <div class="rounded-3xl shadow-lg p-6 md:p-8 border border-neutral-200"
        style="background: radial-gradient(140% 140% at 50% 0%, #FFFFFF 0%, #F4F8FF 60%, #EAF1FF 100%);">
        <div x-show="step === 1" x-cloak aria-live="polite">
            <x-application-step-1 />
        </div>

        <div x-show="step === 2" x-cloak aria-live="polite">
            <x-application-step-2 />
        </div>
        <!-- <div class="mt-8 flex items-center justify-between">
            <button type="button"
                @click="prev()"
                class="px-4 py-2 rounded-full text-neutral-700 bg-white border border-neutral-200 shadow-sm"
                aria-label="Go to previous step"
            >
                Back
            </button>
            <div class="flex items-center gap-2" role="group" aria-label="Step indicators">
                <template x-for="i in total" :key="i">
                    <span 
                        :class="i === step ? 'bg-primary-500' : 'bg-neutral-300'"
                        class="inline-block w-2.5 h-2.5 rounded-full"
                        :aria-label="`Step ${i}`"
                        :aria-current="i === step ? 'step' : false"
                    ></span>
                </template>
            </div>
            <button type="button"
                @click="next()"
                class="px-4 py-2 rounded-full text-white shadow-sm"
                style="background: linear-gradient(90deg, #2D6BB4 0%, #652266 100%);"
                :aria-label="step < total ? 'Go to next step' : 'Finish'"
            >
                <span x-text="step < total ? 'Next' : 'Finish'"></span>
            </button>
        </div> -->
    </div>
</div>