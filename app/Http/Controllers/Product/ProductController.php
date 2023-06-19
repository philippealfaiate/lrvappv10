<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Product::all();

        $collection->map(function ($resource) {
            return $resource->setAttribute('actions', [
                [
                    'label' => 'show',
                    'route' => Route('products.show', $resource->id),
                ],
            ]);
        });

        return view('model.index', [
            'page_title' => Product::getTableName(),
            'columns' => Product::Columns(),
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
    public function show(Product $product)
    {
        $resource = $product->setAttribute('actions', [
            [
                'label' => 'delete',
                'route' => Route('products.destroy', $product->id),
            ],
        ]);

        return view('model.show', [
            'page_title' => Product::getTableName() . ": $resource->name",
            'columns' => Product::columns([], ['description', 'allergens', 'offers', 'composers']),
            'resource' => $resource,
            'relationships' => [
                'description' => [
                    'route' => null,
                ],
                'allergens' => [
                    'route' => route('products.allergens.index', $resource->id),
                ],
                'offers' => [
                    'route' => route('products.offers.index', $resource->id),
                ],
                'composers' => [
                    'route' => route('products.composers.index', $resource->id),
                ],
            ]
        ]);

        return new ProductResource($product);
        return $product->load('offers', 'description');
    }

    // function myFun($resource, $relationship, $name, $value = null)
    // {
    //     if (is_null($resource->$relationship))
    //         return null;
    
    //     return [$relationship => [
    //         'name' => $name,
    //         'value' => is_null($value) ? $resource->$relationship->$value :  $resource->$relationship->count(),
    //         'route' => $resource->$relationship ? route('products.descriptions.show', [$resource->id, $resource->description->id]) : null,
    //     ]]; 
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
