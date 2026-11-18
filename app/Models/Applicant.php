<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model
{
    protected $fillable = [
        'registration_code',
        'full_name',
        'email',
        'whatsapp',
        'institution',
        'first_choice_division_id',
        'second_choice_division_id',
        'portfolio_url',
        'cv_file_path',
        'motivation',
        'status',
    ];

    public function firstChoiceDivision(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'first_choice_division_id');
    }

    public function secondChoiceDivision(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'second_choice_division_id');
    }
}