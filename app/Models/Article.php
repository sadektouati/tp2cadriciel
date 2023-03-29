<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['titre_en',
    'corp_en',
    'titre_fr',
    'corp_fr',
    'id_categorie',
    'id_user'
];
}
