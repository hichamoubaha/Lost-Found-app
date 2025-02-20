<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller {
    public function index(Request $request) {
        $query = $request->input('search');
        $annonces = Annonce::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('titre', 'like', "%{$query}%");
        })->latest()->paginate(3);
    
        return view('annonces.index', compact('annonces'));
    }

    public function create() {
        return view('annonces.create');
    }

    public function filterByCategory($category) {
        $annonces = Annonce::where('categorie', $category)->latest()->paginate(3);
        return view('annonces.index', compact('annonces'));
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
            abort(403); // Unauthorized access
        }
        return view('annonces.edit', compact('annonce'));
    }

    public function update(Request $request, $id) {
        $annonce = Annonce::findOrFail($id);
        if ($annonce->user_id !== Auth::id()) {
            abort(403); // Unauthorized access
        }
    
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
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Optionally delete the old image if it exists
            if ($annonce->image) {
                Storage::disk('public')->delete($annonce->image);
            }
            $imagePath = $request->file('image')->store('annonces', 'public');
            $annonce->image = $imagePath; // Update the image path
        }

        // Update other fields
        $annonce->titre = $request->titre;
        $annonce->description = $request->description;
        $annonce->date_perdu_trouve = $request->date_perdu_trouve;
        $annonce->lieu = $request->lieu;
        $annonce->statut = $request->statut;
        $annonce->categorie = $request->categorie;
        $annonce->contact_email = $request->contact_email;
        $annonce->contact_telephone = $request->contact_telephone;

        $annonce->save(); // Save the updated announcement

        return redirect()->route('annonce.show', $id)->with('success', 'Annonce mise à jour !');
    }

    public function destroy($id) {
        $annonce = Annonce::findOrFail($id);
        if ($annonce->user_id !== Auth::id()) {
            abort(403); // Unauthorized access
        }

        // Optionally delete the image if it exists
        if ($annonce->image) {
            Storage::disk('public')->delete($annonce->image);
        }

        $annonce->delete();
        return redirect()->route('home')->with('success', 'Annonce supprimée.');
    }

    public function dashboard() {
        return view('dashboard', [
            'total_annonces' => Annonce::count(),
            'mes_annonces' => Annonce::where('user_id', Auth::id())->count(),
        ]);
    }
}