<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Prestataire extends Authenticatable
{
    protected $fillable = [
        'name', 'firstname', 'email', 'telephone', 'ville', 'secteurs_activite', 'adresse', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
