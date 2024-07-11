<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'is_accessible',
    ];

    // created for easier checks from the database, and easier to read than a number
    public const IS_ADMIN = 1;
    public const IS_USER = 2;

    // Relationships
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
