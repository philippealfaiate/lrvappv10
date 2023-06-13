<?php

namespace Database\Seeders\Pizza;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllergenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::all()->map(function ($product) {
            // $allergens = fake()->optional()->randomElements(array_flip(config('mkd.allergens')), rand(1, 8));
            $allergens = fake()->randomElements(array_flip(config('mkd.allergens')), rand(1, 8));
            collect($allergens)->map(fn ($allergen) => $product->allergens()->create(['code' => $allergen]));
        });
    }
}
