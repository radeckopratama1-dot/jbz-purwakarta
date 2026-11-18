<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BoardMember extends Model
{
    protected $fillable = [
        'division_id',
        'full_name',
        'role_title',
        'institution',
        'period',
        'photo_path',
        'instagram_handle',
        'linkedin_url',
        'sort_order',
    ];

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
}