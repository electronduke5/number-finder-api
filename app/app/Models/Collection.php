<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'groups', 'collection_id', 'user_id');
    }

    public function items(){
        return $this-> hasMany(CollectionItem::class,'collection_id', 'id');
    }
}
