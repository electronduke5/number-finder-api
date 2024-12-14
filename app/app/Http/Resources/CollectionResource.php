<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Http\Resources\Json\JsonResource;

class CollectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "users" => $this->users,
            "items" => CollectionItemResource::collection($this->items),
        ];
    }
}
