<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = ["nom","prenom", "date_naissance","file_path", "promo", "created_at", "updated_at"];
    
}
