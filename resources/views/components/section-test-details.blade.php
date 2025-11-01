<section class="section-lg">
    <div class="max-w-6xl mx-auto">
        <!-- Heading -->
        <div class="flex flex-col mb-12">
            <x-heading-display-3 style="color: var(--color-secondary-300);">
                Testing and Inspection
            </x-heading-display-3>

            <x-body-1 class="text-neutral-800 opacity-90 mb-8">
                Explore our comprehensive range of laboratory testing standards and methodologies. Click on any test to learn more details.
            </x-body-1>
        </div>

    <div 
    x-data="{ 
        isExpanded: false
    }"
    @class([
        'test-detail-card transition-all duration-300 ease-in-out rounded-2xl gap-6 opacity-100 flex flex-col',
        'expanded' => false,
    ])
    :class="{ 'expanded': isExpanded }"
    style="
        width: 100%;
        backdrop-filter: blur(10px);
    "
>
    <!-- Label -->
    @if($label ?? false)
        <h3 class="heading-4 text-neutral-1000">{{ $label }}</h3>
    @endif

    <!-- Description -->
    @if($description ?? false)
        <p class="body-2 text-neutral-800">{{ $description }}</p>
    @endif

    <!-- Details Section - Hidden by default -->
    <div 
        x-show="isExpanded" 
        class="overflow-hidden"
        style="display: none;"
        x-transition:enter="transition ease-in-out duration-300"
        x-transition:leave="transition ease-in-out duration-300"
    >
        @if($details ?? false)
            <div class="body-3 text-neutral-700 leading-relaxed">
                {{ $details }}
            </div>
        @endif
    </div>


        <!-- Mock Test Detail Data -->
        @php
            $testDetails = [
                [
                    'id' => 1,
                    'label' => 'ASTM D4595',
                    'description' => 'Standard Test Method for Tensile Properties of Geotextiles by the Wide-Width Strip Method.',
                    'details' => 'This is a standard test method for the determination of the tensile properties of geotextiles using the wide-width strip method. This test method is applicable to most geotextiles, nonwoven geotextiles, layered fabrics, and knit fabrics that are used for geotextile applications.'
                ],
                [
                    'id' => 2,
                    'label' => 'ASTM D1557',
                    'description' => 'Standard Test Methods for Laboratory Compaction Characteristics of Soil.',
                    'details' => 'This test method is used to determine the relationship between the water content and the dry density of soils compacted in a mold. The test method applies to soils with a maximum particle size of 37.5 mm (No. 1/2 in.) that can be compacted by the applied compactive effort.'
                ],
                [
                    'id' => 3,
                    'label' => 'ASTM D2216',
                    'description' => 'Standard Test Methods for Laboratory Determination of Water Content of Soil.',
                    'details' => 'This test method covers the laboratory procedures for determining the water content (moisture content) of soil, rock, and similar materials by mass. Water content is used in many soil and rock property tests and calculations, and is one of the most important physical properties in soil engineering.'
                ],
                [
                    'id' => 4,
                    'label' => 'ASTM D6913',
                    'description' => 'Standard Test Methods for Particle-Size Distribution of Soil.',
                    'details' => 'This test method covers the quantitative determination of the distribution of particle sizes in soils. It is used with soils that have less than 30 % material passing a 0.075 mm (No. 200) sieve and less than 30 % gravel size particles.'
                ],
                [
                    'id' => 5,
                    'label' => 'ASTM D2434',
                    'description' => 'Standard Test Method for Permeability of Granular Soils.',
                    'details' => 'This test method covers the determination of the coefficient of permeability (hydraulic conductivity) of granular soils using a constant head permeability apparatus. The method is applicable to soils with moderate to high permeability such as clean sands and gravels.'
                ],
                [
                    'id' => 6,
                    'label' => 'ASTM D3080',
                    'description' => 'Standard Test Method for Direct Shear Test of Soils.',
                    'details' => 'This test method covers the measurement of the shear strength of soils. The direct shear test may be conducted under consolidated drained conditions. This test method is particularly suitable for determining the shear strength of fine-grained soils and coarse-grained soils under consolidated undrained conditions.'
                ],
                [
                    'id' => 7,
                    'label' => 'ASTM D854',
                    'description' => 'Standard Test Methods for Specific Gravity of Soil Solids.',
                    'details' => 'This test method covers the determination of the specific gravity of soil solids that pass a No. 4 (4.75 mm) sieve. The specific gravity of soil solids is required for calculating the void ratio of a soil and for solving certain soil mechanics problems.'
                ],
                [
                    'id' => 8,
                    'label' => 'ASTM D2922',
                    'description' => 'Standard Test Methods for Density of Soil and Rock by Nuclear Methods.',
                    'details' => 'This test method covers the determination of the in-place density of soil and rock by nuclear radiation methods. These methods are useful for quality control testing and acceptance of soil and rock material in the field.'
                ],
                [
                    'id' => 9,
                    'label' => 'ASTM D3744',
                    'description' => 'Standard Test Method for Index Properties of Clay Minerals.',
                    'details' => 'This test method covers procedures for determining index properties of clay minerals that are relevant for engineering classification. These properties include liquid limit, plastic limit, linear shrinkage, and other characteristics important for soil classification.'
                ],
                [
                    'id' => 10,
                    'label' => 'ASTM D6516',
                    'description' => 'Standard Test Method for Measuring Mass Per Unit Area of Geotextiles.',
                    'details' => 'This test method covers the determination of the mass per unit area (basis weight) of geotextiles. The mass per unit area is an important parameter for quality control and acceptance testing of geotextile products used in civil engineering applications.'
                ],
                [
                    'id' => 11,
                    'label' => 'ASTM D6524',
                    'description' => 'Standard Test Method for Measurement of Mass Per Unit Width and Tensile Properties.',
                    'details' => 'This test method covers procedures for determining mass per unit width and tensile properties of reinforced products. These measurements are essential for quality assurance and specification compliance in reinforcement applications.'
                ],
                [
                    'id' => 12,
                    'label' => 'ASTM D5229',
                    'description' => 'Standard Test Method for Measuring the Fastness of Fibers.',
                    'details' => 'This test method covers the determination of the resistance of fibers to the action of water, light, heat, and various chemicals. This fastness testing is critical for applications where color stability and material durability are important performance requirements.'
                ],
            ];
        @endphp

        <!-- Test Detail Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testDetails as $test)
                <x-test-detail-card 
                    :label="$test['label']"
                    :description="$test['description']"
                    :details="$test['details']"
                />
            @endforeach
        </div>
    </div>
</section>
