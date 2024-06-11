<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certafique extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_reservation',
        'demande',
        'validation',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // La certafique appartient à un utilisateur
    }
}
