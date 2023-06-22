<?php

namespace Database\Seeders\Pizza;

use Database\Seeders\SeederHelperTrait;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OfferComposerElementSeeder extends Seeder
{
    use SeederHelperTrait;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offer = $this->getResourceFor(\App\Models\Offer::class, ['name' => 'pizza']);
        $composerElement = $this->getResourceFor(\App\Models\ComposerElement::class, ['id' => 1]);
        $model = $this->getResourceFor(\App\Models\Offer::class, ['name' => 'sauce tomate']);
        
        $oce = $model->offerComposerElements()->create([
            'offer_id' => $offer->id,
            'composer_element_id' => $composerElement->id,
        ]);
    }

}