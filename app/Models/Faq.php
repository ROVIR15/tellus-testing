<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'description',
        'category',
        'is_published',
        'order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}