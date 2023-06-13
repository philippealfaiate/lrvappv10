<?php

namespace App\Http\Controllers\Product;

use App\Models\Description;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product)
    {
        $collection = Description::where('product_id', $product)->get();
        $collection->map(function ($resource) use ($product) {
            return $resource->setAttribute('actions', [
                [
                    'label' => 'show',
                    'route' => Route('products.descriptions.show', [$product, $resource->id]),
                ],
            ]);
        });

        return view('model.index', [
            'page_title' => "Product > " . Description::getTableName(),
            'columns' => Description::Columns(['product_id']),
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
    public function show($product, Description $description)
    {
        $resource = $description;

        // $resource->setAttribute('descrption', $description->description->value?:NULL);
        
        $resource->setAttribute('actions', [
            [
                'label' => 'edit',
                'route' => Route('products.descriptions.edit', [$product, $description->id]),
            ],
            [
                'label' => 'delete',
                'route' => Route('products.descriptions.destroy', [$product, $description->id]),
            ],
        ]);

        return view('model.show', [
            'page_title' => "Product > " . Description::getTableName() . " > Show",
            'columns' => Description::columns(['product_id']),
            'resource' => $resource,
            'relationships' => []
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Description $description)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Description $description)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Description $description)
    {
        //
    }
}
