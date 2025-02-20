@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Ajouter une Annonce</h1>

    <form action="{{ route('annonce.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded p-4">
        @csrf

        <label class="block mb-2">Titre :</label>
        <input type="text" name="titre" class="w-full border rounded p-2 mb-3" required>

        <label class="block mb-2">Description :</label>
        <textarea name="description" class="w-full border rounded p-2 mb-3" required></textarea>

        <label class="block mb-2">Image :</label>
        <input type="file" name="image" class="w-full border rounded p-2 mb-3">

        <label class="block mb-2">Date de perte/trouvaille :</label>
        <input type="date" name="date_perdu_trouve" class="w-full border rounded p-2 mb-3" required>

        <label class="block mb-2">Lieu :</label>
        <input type="text" name="lieu" class="w-full border rounded p-2 mb-3" required>

        <label class="block mb-2">Statut :</label>
        <select name="statut" class="w-full border rounded p-2 mb-3">
            <option value="perdu">Perdu</option>
            <option value="trouvé">Trouvé</option>
        </select>

        <label class="block mb-2">Catégorie :</label>
        <input type="text" name="categorie" class="w-full border rounded p-2 mb-3" required>

        <label class="block mb-2">Email :</label>
        <input type="email" name="contact_email" class="w-full border rounded p-2 mb-3" required>

        <label class="block mb-2">Téléphone :</label>
        <input type="text" name="contact_telephone" class="w-full border rounded p-2 mb-3">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Publier</button>
    </form>
</div>
@endsection
