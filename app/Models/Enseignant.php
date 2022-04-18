<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = ["nom","prenom", "date_naissance","file_path", "grade", "created_at", "updated_at"];
   
}
