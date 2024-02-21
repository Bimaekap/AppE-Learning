<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_induk' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
            'jenis_kelamin' => 'laki-laki',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
