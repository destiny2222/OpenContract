<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contractor>
 */
class ContractorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name;
        return [
            'image'=> $this->faker->imageUrl(640, 480, 'people'),
            'name'=> $name,
            'position'=> $this->faker->jobTitle,
            'slug'=> Str::slug($name),
        ];
    }
}
