<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Entreprise extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'status', 'email', 'telephone', 'ville', 'adresse', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function projets()
    {
        return $this->hasMany(Projet::class);
    }
}

