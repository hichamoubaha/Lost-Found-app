@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Objets Perdus & Trouvés</h1>

    @foreach ($annonces as $annonce)
        <div class="bg-white shadow-md rounded-lg p-4 mb-4">
            <h2 class="text-xl font-semibold">{{ $annonce->titre }}</h2>
            <p class="text-gray-600">{{ $annonce->description }}</p>
            <p class="text-sm text-gray-500">Lieu : {{ $annonce->lieu }} | Date : {{ $annonce->date_perdu_trouve }}</p>
            <a href="{{ route('annonce.show', $annonce->id) }}" class="text-blue-500">Voir plus</a>
        </div>
        @auth
    <a href="{{ route('annonce.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Publier une annonce</a>
@endauth

    @endforeach

    {{ $annonces->links() }}
</div>
@endsection
