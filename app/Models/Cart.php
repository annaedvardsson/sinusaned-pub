<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'user_id',
        'total_sum',
        'is_accessible',
    ];


    //Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cartDetails()
    {
        return $this->hasMany(CartDetail::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
