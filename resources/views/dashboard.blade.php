@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white">
    <div class="max-w-6xl mx-auto p-6">
        <!-- Dashboard Header -->
        <div class="flex items-center gap-3 mb-8">
            <!-- Layout Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                <line x1="3" y1="9" x2="21" y2="9"></line>
                <line x1="9" y1="21" x2="9" y2="9"></line>
            </svg>
            <h1 class="text-3xl font-bold text-gray-800">Tableau de Bord</h1>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Total Announcements Card -->
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-300 p-6">
                <div class="flex items-center justify-between pb-2">
                    <h2 class="text-xl font-semibold text-gray-800">Total des Annonces</h2>
                    <!-- Megaphone Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 11 18-5v12L3 14v-3z"></path>
                        <path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"></path>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-gray-800">{{ $total_annonces }}</div>
                <p class="text-sm text-gray-500 mt-2">Annonces sur la plateforme</p>
            </div>

            <!-- My Announcements Card -->
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-300 p-6">
                <div class="flex items-center justify-between pb-2">
                    <h2 class="text-xl font-semibold text-gray-800">Mes Annonces</h2>
                    <!-- User Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="text-4xl font-bold text-gray-800">{{ $mes_annonces }}</div>
                <p class="text-sm text-gray-500 mt-2">Vos annonces publiées</p>
            </div>
        </div>
<br>
<br>

        <!-- Action Button -->
        <div class="flex justify-center">
            <a href="{{ route('annonce.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-black rounded-lg border-2 border-blue-600 hover:bg-blue-700 hover:text-white transition-colors duration-300">
                <!-- Megaphone Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m3 11 18-5v12L3 14v-3z"></path>
                    <path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"></path>
                </svg>
                Voir les annonces
            </a>
        </div>
    </div>
</div>
@endsection
