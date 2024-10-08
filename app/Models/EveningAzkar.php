<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EveningAzkar extends Model
{
    use HasFactory;
    protected $fillable=[
        'text',
        'count',
        'original_count',
        'like',
    ];

}
