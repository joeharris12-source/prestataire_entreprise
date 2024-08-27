<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'entreprise_id', 'intitule', 'description', 'budget', 'temps_execution', 'cahier_charge',
    ];

    // Relation avec le modèle Entreprise
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
