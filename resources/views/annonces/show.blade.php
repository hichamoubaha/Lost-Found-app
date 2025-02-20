@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <!-- Announcement Title and Description -->
    <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l-4-4m0 0l4-4m-4 4h16" />
        </svg>
        {{ $annonce->titre }}
    </h1>
    <p class="text-gray-600 mt-2">{{ $annonce->description }}</p>
    <div class="text-sm text-gray-500 flex items-center gap-4 mt-2">
        <span class="flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a7 7 0 100 14 7 7 0 000-14zM9 7a1 1 0 112 0v3a1 1 0 01-2 0V7zm1 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
            Lieu : {{ $annonce->lieu }}
        </span>
        <span class="flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M6 2a1 1 0 011 1v2h6V3a1 1 0 112 0v2h1a1 1 0 011 1v10a1 1 0 01-1 1H3a1 1 0 01-1-1V6a1 1 0 011-1h1V3a1 1 0 112 0v2h6V3a1 1 0 112 0v2h1a1 1 0 011 1v10a1 1 0 01-1 1H3a1 1 0 01-1-1V6a1 1 0 011-1h1V3a1 1 0 112 0v2h6V3a1 1 0 112 0v2z" />
            </svg>
            Date : {{ $annonce->date_perdu_trouve }}
        </span>
    </div>
    <p class="text-sm text-gray-500 mt-1">📧 Email : {{ $annonce->contact_email }}</p>
    <p class="text-sm text-gray-500">📞 Telephone : {{ $annonce->contact_telephone }}</p>
    
    <!-- Display Image if it exists -->
    @if ($annonce->image)
        <img src="{{ asset('storage/' . $annonce->image) }}" class="w-full h-64 object-cover rounded-lg mx-auto my-4 shadow-md">
    @else
        <p class="text-gray-500">Aucune image disponible</p>
    @endif

    <!-- Display Comments -->
    <h2 class="text-xl font-semibold mt-6 border-b pb-2">💬 Commentaires</h2>
    @foreach ($annonce->commentaires as $commentaire)
        <div class="bg-gray-100 p-3 rounded my-2 flex items-start gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l-4-4m0 0l4-4m-4 4h16" />
            </svg>
            <div>
                <p>{{ $commentaire->contenu }}</p>
                <p class="text-sm text-gray-500">Posté par {{ $commentaire->user->name }}</p>
            </div>
        </div>
    @endforeach

    <!-- Add Comment Form (Visible only for authenticated users) -->
    @auth
        <form action="{{ route('commentaire.store') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
            <textarea name="contenu" class="w-full border rounded p-2" placeholder="Ajouter un commentaire..." required></textarea>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-2 hover:bg-green-600 transition">Commenter</button>
        </form>
    @else
        <p class="mt-4 text-gray-500">Veuillez vous connecter pour ajouter un commentaire.</p>
    @endauth
</div>
@endsection