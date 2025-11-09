<?php

namespace Database\Factories;

use App\Models\Testimony;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimony>
 */
class TestimonyFactory extends Factory
{
    protected $model = Testimony::class;

    public function definition(): array
    {
        $roles = [
            'Project Engineer',
            'Construction Manager',
            'Field Coordinator',
            'Supervisor',
            'Site Engineer',
        ];

        return [
            'name' => $this->faker->name(),
            'role' => $this->faker->randomElement($roles),
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
            'avatar_path' => null, // keep null; front-end gracefully falls back
            'quote' => $this->faker->realText(180),
            'source' => $this->faker->name() . ', ' . $this->faker->jobTitle(),
            'is_published' => true,
            'order' => 0,
        ];
    }
}