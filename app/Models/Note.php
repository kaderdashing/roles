<?php

namespace App\Models;

use App\Models\Module;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ["type","note", "created_at", "updated_at"];

    public function module(){
        return $this->belongsTo(Module::class);
    
    }
    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    
    }
}
