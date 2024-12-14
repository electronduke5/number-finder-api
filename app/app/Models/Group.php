<?php

namespace App\Models;

use App\Http\Resources\UserForGroupResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_id',
        'user_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function collection(


        
    ){
        return $this->belongsTo(Collection::class, 'collection_id', 'id');
    }
}
