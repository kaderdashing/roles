<?php

namespace App\Models;

use App\Models\Note;
use App\Models\Module;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = ["nom","prenom", "date_naissance","file_path", "promo", "created_at", "updated_at"];
    
    
    public function promotion(){
        return $this->belongsTo(Promotion::class);

    }

    public function notes(){
        return $this->hasMany(Note::class);

    }

  /*  public function moduleNotes()
    {
        return $this->hasManyThrough(Note::class, Module::class);
    } */
}
