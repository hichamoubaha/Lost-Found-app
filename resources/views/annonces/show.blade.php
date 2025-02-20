@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold">{{ $annonce->titre }}</h1>
    <p class="text-gray-600">{{ $annonce->description }}</p>
    <p class="text-sm text-gray-500">Lieu : {{ $annonce->lieu }} | Date : {{ $annonce->date_perdu_trouve }}</p>

    @if ($annonce->image)
        <img src="{{ asset('storage/' . $annonce->image) }}" class="w-full h-64 object-cover rounded-lg my-4">
    @endif

    <h2 class="text-xl font-semibold mt-6">Commentaires</h2>
    @foreach ($annonce->commentaires as $commentaire)
        <div class="bg-gray-100 p-3 rounded my-2">
            <p>{{ $commentaire->contenu }}</p>
            <p class="text-sm text-gray-500">Posté par {{ $commentaire->user->name }}</p>
        </div>
    @endforeach

    @auth
        <form action="{{ route('commentaire.store') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
            <textarea name="contenu" class="w-full border rounded p-2" placeholder="Ajouter un commentaire..." required></textarea>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-2">Commenter</button>
        </form>
    @endauth
</div>
@endsection
