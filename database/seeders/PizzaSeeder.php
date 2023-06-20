<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            \Database\Seeders\Pizza\ProductSeeder::class,
            \Database\Seeders\Pizza\AllergenSeeder::class,
            \Database\Seeders\Pizza\ComposerSeeder::class,
            \Database\Seeders\Pizza\ProductComposerSeeder::class,
        ]);
    }
}
