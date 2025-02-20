@extends('layouts.app')

@section('content')

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold">{{ $annonce->titre }}</h1>
        <p class="text-gray-600">{{ $annonce->description }}</p>

        <p><strong>Catégorie :</strong> {{ $annonce->categorie }}</p>
        <p><strong>Lieu :</strong> {{ $annonce->lieu }}</p>

        @if(!empty($annonce->photo))
            <img src="{{ asset('storage/' . $annonce->photo) }}" class="w-full mt-4 rounded">
        @endif

        <p><strong>Contact :</strong></p>
        <ul class="list-disc ml-5">
            @if(!empty($annonce->contact_email))
                <li>Email : <a href="mailto:{{ $annonce->contact_email }}" class="text-blue-500">{{ $annonce->contact_email }}</a></li>
            @endif
            @if(!empty($annonce->contact_telephone))
                <li>Téléphone : <a href="tel:{{ $annonce->contact_telephone }}" class="text-blue-500">{{ $annonce->contact_telephone }}</a></li>
            @endif
        </ul>

        @auth
            @if(auth()->id() == $annonce->user_id)
                <div class="mt-4 flex space-x-4">
                    <a href="{{ route('annonce.edit', $annonce->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Modifier</a>
                    <form action="{{ route('annonce.destroy', $annonce->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>

@endsection
