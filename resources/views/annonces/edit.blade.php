@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Modifier l'annonce</h1>

        <!-- Update Form -->
        <form action="{{ route('annonces.update', $annonce->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="titre" class="block text-gray-700">Titre</label>
                <input type="text" name="titre" id="titre" value="{{ old('titre', $annonce->titre) }}" 
                       class="mt-1 block w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" 
                          class="mt-1 block w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('description', $annonce->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image (facultatif)</label>
                <input type="file" name="image" id="image" 
                       class="mt-1 block w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="date_perdu_trouve" class="block text-gray-700">Date Perdu/Trouvé</label>
                <input type="date" name="date_perdu_trouve" id="date_perdu_trouve" value="{{ old('date_perdu_trouve', $annonce->date_perdu_trouve) }}" 
                       class="mt-1 block w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="lieu" class="block text-gray-700">Lieu</label>
                <input type="text" name="lieu" id="lieu" value="{{ old('lieu', $annonce->lieu) }}" 
                       class="mt-1 block w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="statut" class="block text-gray-700">Statut</label>
                <select name="statut" id="statut" class="mt-1 block w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="perdu" {{ old('statut', $annonce->statut) == 'perdu' ? 'selected' : '' }}>Perdu</option>
                    <option value="trouvé" {{ old('statut', $annonce->statut) == 'trouvé' ? 'selected' : '' }}>Trouvé</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="categorie" class="block text-gray-700">Catégorie</label>
                <input type="text" name="categorie" id="categorie" value="{{ old('categorie', $annonce->categorie) }}" 
                       class="mt-1 block w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="contact_email" class="block text-gray-700">Email de Contact</label>
                <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $annonce->contact_email) }}" 
                       class="mt-1 block w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="contact_telephone" class="block text-gray-700">Téléphone de Contact (facultatif)</label>
                <input type="text" name="contact_telephone" id="contact_telephone" value="{{ old('contact_telephone', $annonce->contact_telephone) }}" 
                       class="mt-1 block w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                <i class="fas fa-save"></i> Enregistrer les modifications
            </button>
        </form>
    </div>
@endsection