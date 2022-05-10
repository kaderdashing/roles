<?php

namespace App\Models;

use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ["module","etudiant","type","note", "created_at", "updated_at"];

    public function module(){
        return $this->belongsTo(Module::class);
    
    }

}
