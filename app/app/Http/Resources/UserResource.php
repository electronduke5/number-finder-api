<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Group;
use App\Http\Resources\GroupForUserResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //echo $this->id;
        return [
            'id' => $this->id,
            'username' => $this->username,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'tg_id' => $this->tg_id,
            // 'groups' => new GroupForUserResource(Group::all()->where('user_id', '=', $this->id)),
            'collections' => $this->collections,
        ];
    }
}