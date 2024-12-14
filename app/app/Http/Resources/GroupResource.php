<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "users"=> $this->users,        
            "collection"=> $this->collection,      
            //'users' => new UserForGroupResource(User::all()->where('id', '=', $this->user_id))
            //'users' => $this->users
        ];
    }
}
