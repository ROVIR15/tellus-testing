<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\TestimonySeeder;
use Database\Seeders\TestDetailSeeder;
use Database\Seeders\FaqSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed dummy testimonies
        $this->call(TestimonySeeder::class);

        // Seed test details
        $this->call(TestDetailSeeder::class);

        // Seed FAQs from constants
        $this->call(FaqSeeder::class);

        // Seed News items for testing and demo
        $this->call(NewsSeeder::class);
    }
}
