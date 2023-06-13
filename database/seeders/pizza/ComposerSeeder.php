<?php

namespace Database\Seeders\Pizza;

use App\Models\Composer;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComposerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Composer::factory()
        // ->has(Product::factory()
        //     ->count(2)
        //     ->sequence(
        //         ['attribute' => 'First'],
        //         ['attribute' => 'Second'],
        //     )
        //     ->state(function (array $attributes, Product $product) {
        //         return [
        //             'name' => $product->name,
        //         ];
        //     })
        // )
        ->state([
            'name' => 'pizza sauce'
        ])
        ->create();
    }
}
