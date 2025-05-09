<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Guest extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'wedding_id',
        'name',
        'isVIP',
        'url',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($guest) {
            if (empty($guest->url)) {
                // Generate URL following the seeder pattern
                $slug = strtolower(str_replace([' ', '&'], ['-', 'and'], $guest->name));
                $guest->url = "https://momen-bahagia.site/?to={$slug}";
            }
        });
    }

    public function Wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
