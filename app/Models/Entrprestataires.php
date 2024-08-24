<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Entrprestataires extends Authenticatable
{
    protected $table = 'entrprestataires';

    protected $fillable = [
        'name', 
        'firstname', 
        'email', 
        'telephone', 
        'ville', 
        'adresse', 
        'secteurs_activite', 
        'nom_responsable', 
        'nom_entreprise', 
        'date_creation_entreprise', 
        'password',
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
