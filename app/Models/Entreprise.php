<?php


namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Entreprise extends Authenticatable
{

    protected $fillable = [
        'name', 'firstname', 'email', 'telephone', 'ville', 'quartier', 'password',
    ];

    protected $hidden = [
        'password',
    ];
}
