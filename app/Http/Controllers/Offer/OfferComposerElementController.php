<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use App\Models\ComposerElement;
use App\Models\Offer;
use App\Models\OfferComposerElement;
use Illuminate\Http\Request;

class OfferComposerElementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product, Offer $offer, $composer)
    {
        return OfferComposerElement::with('morphable')->whereOfferId($offer->id)->get();
        return $offer->OfferComposerElements;

        // return $offer->composerElements()
        //     ->join('offer_composer_elements', 'offer_composer_elements.composer_element_id', '=', 'composer_elements.id')
        //     ->get();

        return $offer->composers->load('composerElements.morphable.offers');
        // return $offer->composers->load('composerElements', 'composerElements.morphable', 'composerElements.morphable.offers');

        return ComposerElement::with('morphable')->where('composer_id', $composer)
                ->join('offer_composer_elements', 'offer_composer_elements.composer_element_id', '=', 'composer_elements.id')
                ->get();

        // return OfferComposerElement::where(['offer_id' => $offer])->get();

        return $offer->load('composerElements.morphable');
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
    public function show(Offer $offer)
    {
        //
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
