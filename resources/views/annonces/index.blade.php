@extends('layouts.app')

@section('content')

    <h1 class="text-2xl font-bold">Annonces</h1>

    <!-- Formulaire de recherche -->
    <form action="{{ route('annonce.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" placeholder="Rechercher un objet..." class="p-2 border rounded">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Rechercher</button>
    </form>

    <!-- Filtrer par catégorie -->
    <div class="mb-4">
        @foreach(['Vêtements', 'Électronique', 'Clés', 'Autre'] as $category)
            <a href="{{ route('annonce.index', ['category' => $category]) }}" class="bg-gray-300 p-2 rounded">
                {{ $category }}
            </a>
        @endforeach
    </div>

    <!-- Liste des annonces -->
    <div class="grid grid-cols-3 gap-4">
        @foreach($annonces as $annonce)
            <div class="bg-white p-4 rounded shadow">
                <a href="{{ route('annonce.show', $annonce->id) }}">
                    <h2 class="text-xl font-bold">{{ $annonce->titre }}</h2>
                    <p>{{ Str::limit($annonce->description, 100) }}</p>
                </a>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    {{ $annonces->links() }}

@endsection
