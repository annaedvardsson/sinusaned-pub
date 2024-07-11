<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'color_id',
        'title',
        'description',
        'image',
        'price',
        'stock',
        'is_accessible',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('price', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['categories'] ?? false, function ($query, $categories) {
            $query->whereHas('category', function ($query) use ($categories) {
                $query->whereIn('id', $categories);
            });
        });

        $query->when($filters['colors'] ?? false, function ($query, $colors) {
            $query->whereHas('color', function ($query) use ($colors) {
                $query->whereIn('id', $colors);
            });
        });

        $query->when($filters['is_accessibles'] ?? false, function ($query, $is_accessibles) {
            $query->whereIn('is_accessible', $is_accessibles);
        });
    }


    //Relationships
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
}
