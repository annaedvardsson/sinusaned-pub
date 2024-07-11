<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'is_accessible',
    ];


    // Relationships
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
