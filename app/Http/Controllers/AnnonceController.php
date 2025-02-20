<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AnnonceController extends Controller {
    public function index() {
        $annonces = Annonce::latest()->paginate(10);
        return view('annonces.index', compact('annonces'));
    }

    public function create() {
        return view('annonces.create');
    }

    public function store(Request $request) {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_perdu_trouve' => 'required|date',
            'lieu' => 'required|string',
            'statut' => 'required|in:perdu,trouvé',
            'categorie' => 'required|string',
            'contact_email' => 'required|email',
            'contact_telephone' => 'nullable|string',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('annonces', 'public') : null;

        Annonce::create([
            'user_id' => Auth::id(),
            'titre' => $request->titre,
            'description' => $request->description,
            'image' => $imagePath,
            'date_perdu_trouve' => $request->date_perdu_trouve,
            'lieu' => $request->lieu,
            'statut' => $request->statut,
            'categorie' => $request->categorie,
            'contact_email' => $request->contact_email,
            'contact_telephone' => $request->contact_telephone,
        ]);

        return redirect()->route('home')->with('success', 'Annonce ajoutée avec succès !');
    }

    public function show($id) {
        $annonce = Annonce::findOrFail($id);
        return view('annonces.show', compact('annonce'));
    }

    public function edit($id) {
        $annonce = Annonce::findOrFail($id);
        if ($annonce->user_id !== Auth::id()) {
            abort(403);
        }
        return view('annonces.edit', compact('annonce'));
    }

    public function update(Request $request, $id) {
        $annonce = Annonce::findOrFail($id);
        if ($annonce->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'date_perdu_trouve' => 'required|date',
            'lieu' => 'required|string',
            'statut' => 'required|in:perdu,trouvé',
            'categorie' => 'required|string',
            'contact_email' => 'required|email',
            'contact_telephone' => 'nullable|string',
        ]);

        $annonce->update($request->all());

        return redirect()->route('annonce.show', $id)->with('success', 'Annonce mise à jour !');
    }

    public function destroy($id) {
        $annonce = Annonce::findOrFail($id);
        if ($annonce->user_id !== Auth::id()) {
            abort(403);
        }

        $annonce->delete();
        return redirect()->route('home')->with('success', 'Annonce supprimée.');
    }

    public function dashboard()
{
    return view('dashboard', [
        'total_annonces' => Annonce::count(),
        'mes_annonces' => Annonce::where('user_id', Auth::id())->count(),
    ]);
}

}

