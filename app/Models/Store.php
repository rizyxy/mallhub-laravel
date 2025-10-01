<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'floor_id',
        'logo_url',
        'name'
    ];

    public function floor(): BelongsTo
    {
        return $this->belongsTo(Floor::class);
    }
}
