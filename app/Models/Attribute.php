<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    use HasFactory;

    /**
     * Type list
     */
    const TYPE_STRING = 'string';
    const TYPE_INTEGER = 'integer';
    const TYPE_FLOAT = 'float';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'type',
        'is_required',
        'is_filterable',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'is_required' => 'boolean',
        'is_filterable' => 'boolean',
    ];

    /**
     * @return HasMany
     */
    public function values(): HasMany
    {
        return $this->hasMany(AttributeValue::class, 'attribute_id', 'id');
    }
}
