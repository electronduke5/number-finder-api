<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CollectionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'car_number',
        'collection_id',
        'user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'collection_id',
        'user_id',
    ];
    public function collection(){
        return $this->belongsTo(Collection::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
