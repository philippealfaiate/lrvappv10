<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Allergen;
use Illuminate\Http\Request;

class ProductAllergenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product)
    {
        $collection = Allergen::where('product_id', $product)->get();
        $collection->map(function ($resource) use ($product) {
            return $resource->setAttribute('actions', []);
        });

        return view('model.index', [
            'page_title' => "Product > " . Allergen::getTableName(),
            'columns' => Allergen::Columns(['product_id']),
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
    public function show(Allergen $allergen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Allergen $allergen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Allergen $allergen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Allergen $allergen)
    {
        //
    }
}
