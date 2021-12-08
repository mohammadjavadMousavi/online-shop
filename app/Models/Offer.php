<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'expires_at' => 'datetime'
    ];

    protected $casts = [
        'expires_at' => 'datetime'
    ];



}
