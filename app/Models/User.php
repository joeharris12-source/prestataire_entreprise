<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'firstname', 'email', 'password', 'type',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getIsPrestataireAttribute()
    {
        return $this->type === 'prestataire';
    }

    public function getIsEntrepriseAttribute()
    {
        return $this->type === 'entreprise';
    }
}
