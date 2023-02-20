<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ulasan>
 */
class UlasanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lokasi_id' => fake()->numberBetween(1,30),
            'nama' => fake()->name(),
            'email' => fake()->safeEmail(),
            'ulasan' => fake()->paragraph(3),
            'rating' => fake()->numberBetween(1,5)
        ];
    }
}
