<?php

namespace Database\Seeders\Pizza;

use Database\Seeders\SeederHelperTrait;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComposerSeeder extends Seeder
{
    use SeederHelperTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        $composer = $this->composerSeed([
            'name' => 'pizza sauce',
            'type' => \App\Models\Product::class,
        ]);
        collect([
            'sauce tomate',
            'creme fraiche',
        ])->map(function ($element) use ($composer) {
			$this->composerElementSeed($composer, $element);
		});

        //
        $composer = $this->composerSeed([
            'name' => 'topping',
            'type' => \App\Models\Product::class,
        ]);
        collect([
            'mozza',
            'bacon',
        ])->map(function ($element) use ($composer) {
			$this->composerElementSeed($composer, $element);
		});
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
    private function composerSeed(array $composer)
	{
		return \App\Models\Composer::factory()->create($composer);
	}

    private function composerElementSeed(\Illuminate\Database\Eloquent\Model|array $composer, string $element)
    {
        if (is_array($composer))
            $composer = $this->getResourceFor(\App\Models\Composer::class, $composer);

            $model = $this->getResourceFor($composer->type, ['name' => $element]);
            $model->composerElements()->save(new \App\Models\ComposerElement(['composer_id' => $composer->id]));
    }
}
