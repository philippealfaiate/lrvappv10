<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Models\Composer;
use Illuminate\Http\Request;
use App\Models\ProductComposer;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductComposerResource;

class ProductComposerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $collection = $product->composers;
        $collection->map(function ($resource) use ($product) {
            return $resource->setAttribute('actions', [
                [
                    'label' => 'elements',
                    'route' => Route('products.composers.show', [$product, $resource->id]),
                ],
            ]);
        });

        return view('model.index', [
            'page_title' => "Product > " . Composer::getTableName(),
            'columns' => Composer::Columns(),
            'collection' => $collection,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, Composer $composer)
    {
        // return new ProductComposerResource($composer);
        
        return $composer->load('composerElements.morphable.offers');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($composer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $composer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($composer)
    {
        //
    }
}
