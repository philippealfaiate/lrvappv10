<?php

namespace App\Http\Controllers\Offer;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product)
    {
        $collection = Offer::where('product_id', $product)->get();

        $collection->map(function ($resource) use ($product) {
            return $resource->setAttribute('actions', [
                [
                    'label' => 'show',
                    'route' => Route('products.offers.show', [$product, $resource->id]),
                ],
            ]);
        });

        return view('model.index', [
            'page_title' => "Product > " . Offer::getTableName(),
            'columns' => Offer::Columns(['product_id']),
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
    public function show($product, Offer $offer)
    {
        $resource = $offer;
        // \Illuminate\Support\Facades\DB::enableQueryLog();
        // dd(
        //     $offer->composers->load('composerElements'),
        //     \Illuminate\Support\Facades\DB::getQueryLog(),
        // );
        
        $resource->setAttribute('actions', [
            [
                'label' => 'edit',
                'route' => Route('products.offers.edit', [$product, $offer->id]),
            ],
            [
                'label' => 'delete',
                'route' => Route('products.offers.destroy', [$product, $offer->id]),
            ],
        ]);

        return view('model.show', [
            'page_title' => "Product > " . Offer::getTableName() . ": $resource->name",
            'columns' => Offer::columns(['product_id'], ['description', 'allergens', 'siblings', 'composers']),
            'resource' => $resource,
            'relationships' => [
                'description' => [
                    'name' => 'Description',
                    'value' => 'value',
                    'route' => route('products.descriptions.show', [$resource->id, $resource->description->id??0]),
                ],
                'allergens' => [
                    'name' => 'Allergens',
                    'value' => $resource->allergens()->count(),
                    'route' => route('products.allergens.index', $resource->id),
                ],
                'siblings' => [
                    'name' => 'Siblings',
                    // 'value' => $resource->siblings()->count(),
                    'value' => $resource->siblings->pluck('name_attribute')->join(', '),
                    'route' => route('products.offers.index', [$resource->id]),
                ],
                'composers' => [
                    'name' => 'Composers',
                    'route' => route('products.offers.composers.index', [$product, $resource->id]),
                ],
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($product, Offer $offer)
    {
        return 'Show Edit Form';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
