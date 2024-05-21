<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [

        "user_id",
        "name",
        "number",
        "email",
        "method",
        "address",
        "total_products",
        "total_price",
        "placed_on",
        "payment_status",
        
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
