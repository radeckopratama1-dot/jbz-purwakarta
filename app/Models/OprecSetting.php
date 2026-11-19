<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OprecSetting extends Model
{
    protected $fillable = [
        'batch_name',
        'is_open',
        'start_date',
        'end_date',
        'timeline_text',
        'closed_message',
    ];

    protected $casts = [
        'is_open' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Memeriksa apakah pendaftaran saat ini sedang aktif dan dibuka.
     */
    public function isCurrentlyOpen(): bool
    {
        if (! $this->is_open) {
            return false;
        }

        $today = now()->startOfDay();

        if ($this->start_date && $today->lt($this->start_date->startOfDay())) {
            return false;
        }

        if ($this->end_date && $today->gt($this->end_date->endOfDay())) {
            return false;
        }

        return true;
    }

    /**
     * Mengurai timeline_text menjadi array terstruktur [date, title].
     */
    public function parsedTimeline(): array
    {
        if (empty($this->timeline_text)) {
            return [];
        }

        $lines = preg_split('/\r\n|\r|\n/', trim($this->timeline_text));
        $items = [];

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '') {
                continue;
            }

            $parts = explode('|', $line, 2);
            $items[] = [
                'date' => trim($parts[0] ?? ''),
                'title' => trim($parts[1] ?? $parts[0]),
            ];
        }

        return $items;
    }
}
