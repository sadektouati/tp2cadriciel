<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    
    use HasFactory;
    protected $fillable = ['nom_fr', 'nom_en', 'id_user', 'slug'];

    function owner() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

}
