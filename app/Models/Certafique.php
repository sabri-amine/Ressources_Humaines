<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certafique extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_reservation',
        'demande',
        'validation',
    ];
}
