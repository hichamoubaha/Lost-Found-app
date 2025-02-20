@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tableau de Bord</h1>

    <div class="grid grid-cols-2 gap-4">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-xl font-semibold">Total des Annonces</h2>
            <p class="text-3xl">{{ $total_annonces }}</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-xl font-semibold">Mes Annonces</h2>
            <p class="text-3xl">{{ $mes_annonces }}</p>
        </div>
    </div>
    <a href="{{ route('annonce.index') }}">Voir les annonces</a>

</div>
@endsection
