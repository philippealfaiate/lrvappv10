<?php

namespace Database\Seeders;

trait SeederHelperTrait
{
    function getResourceFor(string $model, array $where)
    {
        return $model::where($where)->first();
    }

    /**
     * Attach a composer resource to a product
     */
    private function productComposerCreate(array $product, array $composer)
	{
        $product = $this->getResourceFor(\App\Models\Product::class, $product);
        $composer = $this->getResourceFor(\App\Models\Composer::class, $composer); 
        return $product->composers()->attach($composer);
	}
}