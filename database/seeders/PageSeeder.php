<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define mappings: source (public/...) => destination (storage/app/public/pages/home/...)
        $filesToCopy = [
            'images/vector-2.svg' => 'pages/home/vector-2.svg',
            'images/hero-section.png' => 'pages/home/hero-section.png',
            'images/decorative-about-us/union-2.svg' => 'pages/home/union-2.svg',
            'images/vector-3.svg' => 'pages/home/vector-3.svg',
            'images/elipse-6.svg' => 'pages/home/elipse-6.svg',
            'images/bg-fqa-eclipse.svg' => 'pages/home/bg-fqa-eclipse.svg',
            'images/inquiry-image.png' => 'pages/home/inquiry-image.png',
            'images/who-we-serve/1.png' => 'pages/home/serve/1.png',
            'images/who-we-serve/2.png' => 'pages/home/serve/2.png',
            'images/who-we-serve/3.png' => 'pages/home/serve/3.png',
            'images/complete-who-we-serve/4.png' => 'pages/home/serve/4.png',
            
            // Lab carousel
            'images/inside-lab/1.png' => 'pages/home/lab/1.png',
            'images/inside-lab/2.png' => 'pages/home/lab/2.png',
            'images/inside-lab/3.png' => 'pages/home/lab/3.png',
            'images/inside-lab/4.jpg' => 'pages/home/lab/4.jpg',
            'images/inside-lab/5.jpg' => 'pages/home/lab/5.jpg',

            // Lab services
            'images/lab-facility/1.png' => 'pages/home/services/1.png',
            'images/lab-facility/2.png' => 'pages/home/services/2.png',
            'images/lab-facility/3.jpg' => 'pages/home/services/3.jpg',
            // About Us
            'images/decorative-about-us/union-3.svg' => 'pages/about/union-3.svg',
            'images/decorative-about-us/union-1.svg' => 'pages/about/union-1.svg',
            'images/about-us.png' => 'pages/about/about-us.png',
            'images/tellus-team.jpg' => 'pages/about/tellus-team.jpg',
            'images/decorative-about-us/union-2.svg' => 'pages/about/union-2.svg',
            
            // Why Choose Us
            'images/about/why-choose-us/1.png' => 'pages/about/why-choose/1.png',
            'images/about/why-choose-us/2.png' => 'pages/about/why-choose/2.png',
            'images/about/why-choose-us/3.png' => 'pages/about/why-choose/3.png',
            'images/about/why-choose-us/4.png' => 'pages/about/why-choose/4.png',
            'images/about/why-choose-us/5.png' => 'pages/about/why-choose/5.png',
            'images/about/why-choose-us/6.png' => 'pages/about/why-choose/6.png',

            // Quality
            'images/icons/quality/1.png' => 'pages/about/quality/1.png',
            'images/icons/quality/2.png' => 'pages/about/quality/2.png',
            'images/icons/quality/3.png' => 'pages/about/quality/3.png',
            'images/icons/quality/4.png' => 'pages/about/quality/4.png',
            'images/icons/quality/5.png' => 'pages/about/quality/5.png',

            // Accreditation
            'images/icons/accreditation/1.svg' => 'pages/about/accreditation/1.svg',
            'images/icons/accreditation/2.svg' => 'pages/about/accreditation/2.svg',
            'images/icons/accreditation/3.svg' => 'pages/about/accreditation/3.svg',
            'images/icons/accreditation/4.svg' => 'pages/about/accreditation/4.svg',
            'images/about/accreditation/1.png' => 'pages/about/accreditation/1.png',
            'images/about/accreditation/2.png' => 'pages/about/accreditation/2.png',
            'images/about/accreditation/3.png' => 'pages/about/accreditation/3.png',
            'images/about/accreditation/4.png' => 'pages/about/accreditation/4.png',
        ];

        // Ensure directories exist and copy files
        foreach ($filesToCopy as $source => $dest) {
            $sourcePath = public_path($source);
            if (File::exists($sourcePath)) {
                Storage::disk('public')->put($dest, File::get($sourcePath));
            }
        }

        // Create Home Page
        Page::updateOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Home',
                'content' => [
                    'hero_bg' => 'pages/home/vector-2.svg',
                    'hero_main_image' => 'pages/home/hero-section.png',
                    'hero_title' => 'Accurate testing for geosynthetic materials.',
                    'hero_description' => 'Certified lab services for soil and water testing. Specialized in PVD analysis and geotechnical evaluations. Accurate results for confident project decisions.',
                    
                    'inside_lab_bg' => 'pages/home/union-2.svg',
                    'inside_lab_carousel' => [
                        [
                            'title' => 'Modern Architecture',
                            'image' => 'pages/home/lab/1.png',
                            'description' => 'State-of-the-art facility design'
                        ],
                        [
                            'title' => 'Advanced Laboratory',
                            'image' => 'pages/home/lab/2.png',
                            'description' => 'Cutting-edge testing equipment'
                        ],
                        [
                            'title' => '3 Engineering',
                            'image' => 'pages/home/lab/3.png',
                            'description' => 'Expert analysis and quality control'
                        ],
                        [
                            'title' => '4 Engineering',
                            'image' => 'pages/home/lab/4.jpg',
                            'description' => 'Expert analysis and quality control'
                        ],
                        [
                            'title' => '5 Engineering',
                            'image' => 'pages/home/lab/5.jpg',
                            'description' => 'Expert analysis and quality control'
                        ],
                    ],

                    'lab_services' => [
                        [
                            'title' => 'Permeability & Hydraulic Conductivity Test',
                            'description' => 'Measure soil water permeability',
                            'image' => 'pages/home/services/1.png'
                        ],
                        [
                            'title' => 'Soil Compaction Analysis',
                            'description' => 'Determine optimal soil density',
                            'image' => 'pages/home/services/2.png'
                        ],
                        [
                            'title' => 'Water Quality Testing',
                            'description' => 'Comprehensive water analysis',
                            'image' => 'pages/home/services/3.jpg'
                        ],
                        [
                            'title' => 'Bearing Capacity Test',
                            'description' => 'Foundation load assessment',
                            'image' => 'pages/home/services/4.jpg'
                        ],
                    ],

                    'who_we_serve' => [
                        'card_1' => 'pages/home/serve/1.png',
                        'card_2' => 'pages/home/serve/2.png',
                        'card_3' => 'pages/home/serve/3.png',
                        'highlight_image' => 'pages/home/serve/4.png',
                    ],

                    'vector_3' => 'pages/home/vector-3.svg',
                    'elipse_6' => 'pages/home/elipse-6.svg',
                    'bg_fqa_eclipse' => 'pages/home/bg-fqa-eclipse.svg',
                    'inquiry_image' => 'pages/home/inquiry-image.png',
                ]
            ]
        );

        // Create About Us Page
        Page::updateOrCreate(
            ['slug' => 'about-us'],
            [
                'title' => 'About Us',
                'content' => [
                    'top_section_bg_left' => 'pages/about/union-3.svg',
                    'top_section_bg_right' => 'pages/about/union-1.svg',
                    'about_main_image' => 'pages/about/about-us.png',
                    'about_title' => 'About Us',
                    'about_description' => 'Tellus Testing has a full range of state-of-the-art equipment to conduct professional testing and inspection of geosynthetic materials.',
                    
                    'team_image' => 'pages/about/tellus-team.jpg',
                    'team_title' => 'Our team consists of highly skilled technicians & experienced professionals that provide reliable data quality, and efficient services for competitive prices.',
                    'team_description' => 'Our testing services include a full scope of geosynthetic tests that determine physical, mechanical, hydraulic properties in accordance with ISO and ASTM standards to ensure that those materials that are used for ground improvement projects meet the specified quality standards.',
                    
                    'why_choose_bg' => 'pages/about/union-2.svg',
                    'why_choose_us' => [
                        ['title' => 'Independent & Accredited: unbiased testing with full traceability', 'decoratiove_url' => 'pages/about/why-choose/1.png'],
                        ['title' => 'Modern Equipment: high-precision instruments', 'decoratiove_url' => 'pages/about/why-choose/2.png'],
                        ['title' => 'Fast Turnaround: standard and expedited testing available', 'decoratiove_url' => 'pages/about/why-choose/3.png'],
                        ['title' => 'Detailed Reporting: clear, standards-based documentation', 'decoratiove_url' => 'pages/about/why-choose/4.png'],
                        ['title' => 'Client Support: dedicated support and customized consultation', 'decoratiove_url' => 'pages/about/why-choose/5.png'],
                        ['title' => 'Competitive pricing & customization available', 'decoratiove_url' => 'pages/about/why-choose/6.png'],
                    ],

                    'quality_cards' => [
                        ['label' => 'To provide high quality test results and excellent professional service to our customers.', 'icon' => 'pages/about/quality/1.png'],
                        ['label' => 'To understand the needs and expectations of internal and external interested parties that are relevant to our Quality Management System.', 'icon' => 'pages/about/quality/2.png'],
                        ['label' => 'To ensure impartiality, transparency and independence in all our activities without association with any parties.', 'icon' => 'pages/about/quality/3.png'],
                        ['label' => 'To continuously improve the skills & competences of the laboratory personnel.', 'icon' => 'pages/about/quality/4.png'],
                        ['label' => 'To continuously improve the effectiveness of our Quality Management System according to ISO 9001:2015', 'icon' => 'pages/about/quality/5.png'],
                    ],

                    'accreditations' => [
                        ['title' => 'ISO/IEC 17025 Certified', 'description' => 'Ensures global test accuracy', 'url' => 'pages/about/accreditation/1.png'],
                        ['title' => 'ILAC MRA Recognized', 'description' => 'Accepted worldwide', 'url' => 'pages/about/accreditation/2.png'],
                        ['title' => '16+ Accredited Methods', 'description' => 'Covering PVD & Geotextile', 'url' => 'pages/about/accreditation/3.png'],
                        ['title' => 'Verify Accreditation', 'description' => 'You can verify our accreditation from Department of Standards Malaysia (DSM)', 'url' => 'pages/about/accreditation/4.png'],
                    ]
                ]
            ]
        );
    }
}
