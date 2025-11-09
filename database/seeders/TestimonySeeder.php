<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class TestimonySeeder extends Seeder
{
    /**
     * Seed the testimonies table with dummy records.
     */
    public function run(): void
    {
        Testimony::factory()
            ->count(8)
            ->state(new Sequence(
                fn ($sequence) => ['order' => $sequence->index]
            ))
            ->create();
    }
}