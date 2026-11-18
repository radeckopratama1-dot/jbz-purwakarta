<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'short_code',
        'description',
        'sort_order',
    ];

    public function boardMembers(): HasMany
    {
        return $this->hasMany(BoardMember::class)->orderBy('sort_order');
    }

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}