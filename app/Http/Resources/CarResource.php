<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
            'motorisation' => [
                'id' => $this->motorisation->id ?? null,
                'type' => $this->motorisation->type ?? null,
                'name' => $this->motorisation->name ?? null,
            ],
            'generation' => [
                'id' => $this->generation->id ?? null,
                'name' => $this->generation->name ?? null,
            ],
            'priceranges' => $this->whenLoaded('priceranges', function () {
                return $this->priceranges->map(function ($pricerange) {
                    return [
                        'id' => $pricerange->id,
                        'name' => $pricerange->name,
                        'min' => $pricerange->min,
                        'max' => $pricerange->max,
                    ];
                });
            }) ?? null,
            'modele' => $this->motorisation->modele
            ? [
                'id' => $this->motorisation->modele->id,
                'name' => $this->motorisation->modele->name,
                'brand' => $this->motorisation->modele->mark
                    ? [
                        'id' => $this->motorisation->modele->mark->id,
                        'name' => $this->motorisation->modele->mark->name,
                    ]
                    : null,
            ]
            : null,        
        ];
    }
}
