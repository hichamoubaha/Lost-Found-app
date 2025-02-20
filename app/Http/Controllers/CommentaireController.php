<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'annonce_id' => 'required|exists:annonces,id',
            'contenu' => 'required|string|max:500',
        ]);

        Commentaire::create([
            'user_id' => Auth::id(),
            'annonce_id' => $request->annonce_id,
            'contenu' => $request->contenu,
        ]);

        return back()->with('success', 'Commentaire ajouté.');
    }
}

