<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CollectionItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            'image' =>  asset(Storage::url($this->image)),
            'car_number' => $this->car_number,
            'created_at' => $this->created_at,
            'collection' => $this->collection,
            'user' => $this->user,
        ];
    }
}
