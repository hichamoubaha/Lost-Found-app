<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id', 'titre', 'description', 'image', 'date_perdu_trouve', 
        'lieu', 'statut', 'categorie', 'contact_email', 'contact_telephone'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function commentaires() {
        return $this->hasMany(Commentaire::class);
    }
}

