@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-bullhorn text-blue-500 mr-2"></i> Annonces
        </h1>

        <!-- Search Form -->
        <form action="{{ route('annonce.index') }}" method="GET" class="mb-8">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Rechercher un objet..." 
                       value="{{ request('search') }}" 
                       class="flex-1 p-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" 
                        class="bg-blue-500 text-white p-3 rounded-r-lg hover:bg-blue-600 transition duration-100 flex items-center">
                    <i class="fas fa-search mr-2"></i> Rechercher
                </button>
            </div>
        </form>

        <!-- Display No Results Message -->
        @if($annonces->isEmpty())
            <div class="text-gray-500 text-center mt-4">
                <p>Aucune annonce trouvée pour "{{ request('search') }}".</p>
            </div>
        @endif

        <!-- Category Filters -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Filtrer par catégorie</h2>
            <div class="flex space-x-4">
                @foreach(['Vêtements', 'Électronique', 'Clés', 'Autre'] as $category)
                    <a href="{{ route('annonces.filterByCategory', $category) }}" 
                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-blue-500 hover:text-white transition duration-300">
                        <i class="fas fa-tag mr-2"></i>{{ $category }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Annonces List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($annonces as $annonce)
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <a href="{{ route('annonce.show', $annonce->id) }}" class="block">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $annonce->titre }}</h2>
                        <p class="text-gray-600 mb-4">{{ Str::limit($annonce->description, 100) }}</p>
                        <div class="flex items-center text-gray-500">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <span>{{ $annonce->created_at->format('d M Y') }}</span>
                        </div>
                    </a>

                    <!-- Update and Delete Buttons -->
                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('annonce.edit', $annonce->id) }}" 
                           class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-200">
                            <i class="fas fa-edit"></i> Modifier
                        </a>

                        <form action="{{ route('annonces.destroy', $annonce->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-200">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $annonces->links() }}
        </div>
    </div>
@endsection