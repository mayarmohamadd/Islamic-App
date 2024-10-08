<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MorningAzkar extends Model
{
    use HasFactory;
    protected $fillable=[
        'text',
        'count',
        'original_count',
        'like',
    ];

    protected static function booted()
    {
        static::creating(function ($morningAzkar) {
            $morningAzkar->original_count = $morningAzkar->count;
        });
    }
}
