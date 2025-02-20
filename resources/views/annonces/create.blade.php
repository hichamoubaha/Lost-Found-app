@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="bg-gradient-to-r from-blue-600 to-blue-400 rounded-t-lg p-6 text-white">
        <h1 class="text-3xl font-bold flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
            </svg>
            Ajouter une Annonce
        </h1>
    </div>

    <form action="{{ route('annonce.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-b-lg p-8">
        @csrf

        <div class="space-y-6"> <!-- Removed the grid layout and added space-y-6 to stack the items vertically -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    Titre
                </label>
                <input type="text" name="titre" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    Description
                </label>
                <textarea name="description" class="w-full border rounded-lg p-3 h-32 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" required></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                    Image
                </label>
                <input type="file" name="image" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    Date de perte/trouvaille
                </label>
                <input type="date" name="date_perdu_trouve" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    Lieu
                </label>
                <input type="text" name="lieu" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                        Statut
                    </label>
                    <select name="statut" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        <option value="perdu">Perdu</option>
                        <option value="trouvé">Trouvé</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        Catégorie
                    </label>
                    <input type="text" name="categorie" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" required>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    Email
                </label>
                <input type="email" name="contact_email" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 7V3l-4 4h3V7zM6 17l4-4H7v3h5v4h3v-7h-2V9l-4 4V7l-4 4v6h3z"></path>
                    </svg>
                    Téléphone
                </label>
                <input type="tel" name="contact_tel" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" required>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white py-4 px-6 rounded-lg hover:bg-blue-700 transition">Ajouter l'Annonce</button>
            </div>
        </div>
    </form>
</div>
@endsection
