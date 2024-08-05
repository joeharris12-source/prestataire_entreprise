<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    use HasFactory;

    protected $table = 'prestataires';

    protected $fillable = [
        'name', 'firstname', 'email', 'password',
    ];

    protected $hidden = [
        'password',
    ];
}
