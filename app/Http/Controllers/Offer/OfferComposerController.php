<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use App\Models\Composer;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferComposerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product, Offer $offer)
    {
        $collection = $offer->composers;

        $collection->map(function ($resource) use ($product, $offer) {
            return $resource->setAttribute('actions', [
                [
                    'label' => 'elements',
                    'route' => Route('products.offers.composers.elements.index', [$product, $offer->id, $resource->id]),
                ],
            ]);
        });

        return view('model.index', [
            'page_title' => "Product > Offer > Composers",
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
    public function show($product, Offer $offer, Composer $composer)
    {
        //! This method is not required
        return $offer->load('composers.composerElements.morphable.offers');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        //
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
