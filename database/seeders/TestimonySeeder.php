<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class TestimonySeeder extends Seeder
{
    /**
     * Seed the testimonies table with defined dummy records.
     */
    public function run(): void
    {
        $dummy = [
            [
                'name' => 'Budi Santoso',
                'role' => 'Project Engineer',
                'company' => 'GeoTek Nusantara',
                'location' => null,
                'avatar_path' => null,
                'quote' => 'Tellus Testing delivered clear, reliable results on tight timelines. Their reports directly informed our foundation design.',
                'source' => 'Sarah T., Project Manager',
            ],
            [
                'name' => 'Hiroshi Tanaka',
                'role' => 'Construction Manager',
                'company' => 'ArchiPro Southeast',
                'location' => null,
                'avatar_path' => null,
                'quote' => 'Accurate testing and professional communication. The team helped us resolve material issues before they became costly.',
                'source' => 'Sarah T., Project Manager',
            ],
            [
                'name' => 'Sandi Wibowo',
                'role' => 'Construction Manager',
                'company' => 'ArchiPro Southeast',
                'location' => null,
                'avatar_path' => null,
                'quote' => 'The on-site crew was meticulous and safety-minded. Data quality exceeded expectations for QA/QC.',
                'source' => 'Sarah T., Project Manager',
            ],
            [
                'name' => 'Doni Saputra',
                'role' => 'Field Coordinator',
                'company' => 'ConstructAsia',
                'location' => null,
                'avatar_path' => null,
                'quote' => 'Fast turnaround and transparent methods. Their findings kept our schedule on track.',
                'source' => 'Sarah T., Project Manager',
            ],
            [
                'name' => 'Rudi Prabowo',
                'role' => 'Supervisor',
                'company' => 'BuildTech',
                'location' => null,
                'avatar_path' => null,
                'quote' => 'Consistent, repeatable measurements and practical recommendations. We’d gladly work with them again.',
                'source' => 'Sarah T., Project Manager',
            ],
        ];

        foreach ($dummy as $index => $data) {
            Testimony::updateOrCreate(
                [
                    'name' => $data['name'],
                    'company' => $data['company'] ?? null,
                ],
                array_merge($data, [
                    'is_published' => true,
                    'order' => $index,
                ])
            );
        }
    }
}