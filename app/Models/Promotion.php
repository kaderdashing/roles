<?php

namespace App\Models;

use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = ["option", "annee", "libelle", "created_at", "updated_at"];

    public function etudiants() {
            return $this->hasMany(Etudiant::class);

    }

}
