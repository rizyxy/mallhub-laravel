<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'store_id',
        'sub_category_id',
        'name',
        'description',
        'price'
    ];

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
