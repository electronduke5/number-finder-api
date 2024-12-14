<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [        
            'user_id' => 'required|integer|exists:users,id',
            'collection_id' => 'required|integer|exists:collections,id',
        ];
    }
}
