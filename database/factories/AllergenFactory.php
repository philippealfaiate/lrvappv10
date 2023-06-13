<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Allergen>
 */
class AllergenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            // 'code' => fake()->randomElement(config('mkd.allergens_codes')),
            'code' => 'AAA',
            'has_traces' => fake()->boolean(.25),
        ];
    }
}
