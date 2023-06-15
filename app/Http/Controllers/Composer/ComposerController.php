<?php

namespace App\Http\Controllers\Composer;

use App\Http\Controllers\Controller;
use App\Models\Composer;
use Illuminate\Http\Request;

class ComposerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Composer::all();

        $collection->map(function ($resource) {
            return $resource->setAttribute('actions', [
                [
                    'label' => 'show',
                    'route' => Route('composers.show', $resource->id),
                ],
            ]);
        });

        return view('model.index', [
            'page_title' => Composer::getTableName(),
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
    public function show(Composer $composer)
    {
        $resource = $composer->setAttribute('actions', [
            [
                'label' => 'delete',
                'route' => Route('products.destroy', $composer->id),
            ],
        ]);

        return view('model.show', [
            'page_title' => Composer::getTableName() . ": $resource->name",
            'columns' => Composer::columns([], ['composerElements']),
            'resource' => $resource,
            'relationships' => [
                'composerElements' => [
                    'route' => route('composers.elements.index', $resource->id),
                ],
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Composer $composer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Composer $composer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Composer $composer)
    {
        //
    }
}
