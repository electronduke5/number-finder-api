<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'tg_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    public function groups(){
        return $this->hasMany(Group::class);
    }

    public function collections(){
        return $this->belongsToMany(Collection::class, 'groups', 'user_id', 'collection_id');
    }
}
