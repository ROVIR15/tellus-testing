<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'company_website',
        'company_country',
        'company_city',
        'company_address',
        'zip',
        'phone_country_code',
        'phone_number',
        'email',
        'message',
        'ip_address',
        'user_agent',
    ];
}

