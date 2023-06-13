<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'attribute' => $this->attribute,            
            // 'description' => (new DescriptionResource($this->description))->value,
            'description2' => $this->whenLoaded('description', function () {
                return 'yep';
            }, 'nope'),

            // 'siblings' => $this->siblings,
        ];
    }
}
