<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(10);
        return [
            'title'=> $title,
            'slug'=> Str::slug($title),
            'body'=> $this->faker->paragraph(100),
            'value'=> $this->faker->numberBetween(100000),
            'award_date'=> $this->faker->date(),
            'email'=> $this->faker->email(),
            'award'=>$this->faker->boolean(),
            'location'=> $this->faker->word(),
            'contract_amount'=> $this->faker->numberBetween(100000),
            'tender_amount'=> $this->faker->numberBetween(100000),
            'budget_amount'=> $this->faker->numberBetween(100000),
            'company_name'=> $this->faker->word(),
            'contructor_name'=> $this->faker->userName(),
            'contructor_origin'=> $this->faker->word(),
            'category'=>$this->faker->word(),
            'year'=> $this->faker->year(),
            'procuring_entity'=> $this->faker->word(),
            'status'=> $this->faker->boolean(),
            'active'=> $this->faker->boolean(),
            'contractor_id'=>fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9,10]),
        ];
    }
}
