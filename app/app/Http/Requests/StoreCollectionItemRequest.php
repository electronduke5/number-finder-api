<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCollectionItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'image' => 'required|image',
            'car_number' => 'required',
            'collection_id' => 'required|integer|exists:collections,id',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
