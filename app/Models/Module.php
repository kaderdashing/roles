<?php

namespace App\Models;

use App\Models\Note;
use App\Models\Editeur;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ["libelle","controle", "examen","tp", "option", "semestre", "created_at", "updated_at"];

public function editeurs(){
    return $this->belongsToMany(Editeur::class) ;
}
/*
public function etudiant(){
    return $this->belongsTo(Etudiant::class);

}
public function notes(){
    return $this->hasMany(Note::class);

}
*/
public function notes(){
    return $this->hasMany(Note::class);

}
}
