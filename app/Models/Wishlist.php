<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable=[

        "user_id",
        "pid",
        "name",
        "price",
        "image"

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
