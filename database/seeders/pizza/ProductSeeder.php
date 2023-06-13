<?php

namespace Database\Seeders\Pizza;

use App\Models\Offer;
use App\Models\Product;
use App\Models\Description;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * 
         */
        Product::factory()
        ->has(Offer::factory()
            ->count(2)
            ->sequence(
                ['attribute' => 'First'],
                ['attribute' => 'Second'],
            )
            ->state(function (array $attributes, Product $product) {
                return [
                    'name' => $product->name,
                ];
            })
        )
        ->has(Description::factory())
        ->state([
            'name' => 'pizza'
        ])
        ->create();

        /**
         * 
         */
        Product::factory()
        ->has(Offer::factory()
            ->count(2)
            ->sequence(
                ['attribute' => 'First'],
                ['attribute' => 'Second'],
            )
            ->state(function (array $attributes, Product $product) {
                return [
                    'name' => $product->name,
                ];
            })
        )
        ->state([
            'name' => 'sauce tomate'
        ])
        ->create();

        /**
         * 
         */
        Product::factory()
        ->has(Offer::factory()
            ->count(2)
            ->sequence(
                ['attribute' => 'First'],
                ['attribute' => 'Second'],
            )
            ->state(function (array $attributes, Product $product) {
                return [
                    'name' => $product->name,
                ];
            })
        )
        ->state([
            'name' => 'creme fraiche'
        ])
        ->create();
    }
}
