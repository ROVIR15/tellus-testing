<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'description',
        'details',
        'is_published',
        'order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}