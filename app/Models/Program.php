<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Program extends Model
{
    protected $fillable = [
        'division_id',
        'title',
        'slug',
        'pillar',
        'location',
        'event_date',
        'status',
        'summary',
        'content',
        'cover_image',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
}