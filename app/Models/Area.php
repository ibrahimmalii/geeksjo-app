<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static truncate()
 */
class Area extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];

    /**
     * @return BelongsTo
     */
    public function cities(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
