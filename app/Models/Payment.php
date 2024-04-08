<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'FullName',
        'Email',
        'Hotel',
        'NameOnCard',
        'CreditCardNumber',
        'ExpMonth',
        'ExpYear',
        'CVV',
    ];
}
