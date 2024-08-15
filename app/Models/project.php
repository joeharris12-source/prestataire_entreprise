<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'prestataire_id', 'status', 'start_date', 'completion_date'
    ];

    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class);
    }
}
