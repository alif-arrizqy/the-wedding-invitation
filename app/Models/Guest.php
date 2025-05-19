<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_id',
        'name',
        'isVIP',
        'jenis_tamu',
        'is_sent',
        'url',
    ];

    protected static function booted()
    {
        static::creating(function ($guest) {
            // Don't set URL on create - wait for ID to be assigned
        });

        static::created(function ($guest) {
            // Generate URL with the new format
            $guestSlug = str_replace(' ', '-', strtolower($guest->name));
            $guest->url = "https://momen-bahagia.site/?to=" . urlencode($guestSlug);
            $guest->saveQuietly(); // Save without triggering events again
        });

        static::updating(function ($guest) {
            // Only update URL if the name has changed
            if ($guest->isDirty('name')) {
                $guestSlug = str_replace(' ', '-', strtolower($guest->name));
                $guest->url = "https://momen-bahagia.site/?to=" . urlencode($guestSlug);
            }
        });
    }

    public function wedding(): BelongsTo
    {
        return $this->belongsTo(Wedding::class);
    }
}

// $guest->url = "https://momen-bahagia.site/?to={$slug}";
