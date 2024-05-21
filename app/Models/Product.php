<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        "name",
        "category",
        "details",
        "price",
        "image"

    ];

    public function getImageUrlAttribute()
    {
        
        return Storage::disk('public')->url($this->image);
    }


}
