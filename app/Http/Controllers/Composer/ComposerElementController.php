<?php

namespace App\Http\Controllers\Composer;

use App\Http\Controllers\Controller;
use App\Models\ComposerElement;
use Illuminate\Http\Request;

class ComposerElementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($composer)
    {
        $collection = ComposerElement::where('composer_id', $composer)->get();

        $collection->map(function ($resource) use ($composer) {
            return $resource
                ->setAttribute('name', $resource->morphable->name)
                ->setAttribute('actions', [
                    [
                        'label' => 'remove',
                        'route' => null
                    ],
                ]);
        });

        return view('model.index', [
            'page_title' => ComposerElement::getTableName(),
            // 'columns' => ComposerElement::Columns([], ['morphable']),
            'columns' => ['id', 'model_type', 'model_id', 'name'],
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
    public function show(ComposerElement $composerElement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComposerElement $composerElement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ComposerElement $composerElement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComposerElement $composerElement)
    {
        //
    }
}
