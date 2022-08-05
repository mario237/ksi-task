<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 * @method static firstOrCreate(array $array)
 */
class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function entries(): HasMany
    {
        return $this->hasMany(Entry::class);
    }
}
