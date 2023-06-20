<?php

namespace Database\Seeders\Pizza;

use Database\Seeders\SeederHelperTrait;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductComposerSeeder extends Seeder
{
    use SeederHelperTrait;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->productComposerCreate(['name' => 'pizza'], ['name' => 'pizza sauce']);
        $this->productComposerCreate(['name' => 'pizza'], ['name' => 'topping']);
    }

}