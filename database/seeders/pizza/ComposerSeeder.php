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
        // $composer = Composer::factory()
        // ->state([
        //     'name' => 'pizza sauce'
        //     ])
        // ->create();
        
        $this->composerCreate([
            'name' => 'pizza sauce',
            'type' => \App\Models\Product::class,
        ], [
            'sauce tomate',
            'creme fraiche',
        ]);


    }

/*
     * Create a new composer
     * 
        $this->composerCreate(
			[
				'name' => 'Sauces Nuggets (c)',
				'type' => \App\Models\Product::class
			],
			[
				'sauce moutarde',
				'sauce chinoise',
				'sauce barbecue',
				'sauce curry',
			]
		);
     */
    private function composerCreate(array $composer, array $items)
	{
		$composer = \App\Models\Composer::factory()->create($composer);
		collect($items)->map(function ($item) use ($composer) {
			$model = $composer->type::where('name', $item)->first();
			$model->composerElements()->save(new \App\Models\ComposerElement(['composer_id' => $composer->id]));
		});
	}

}
