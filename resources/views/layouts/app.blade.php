<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <nav class="bg-blue-500 text-white p-4">
        <div class="max-w-6xl mx-auto flex justify-between">
            <a href="{{ route('home') }}" class="text-lg font-bold">Lost & Found</a>
          
            @auth
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="text-white">Déconnexion</button>
    </form>
@endauth

        </div>
    </nav>
    
    <div class="text-center mt-4">
        @auth
            <!-- Updated button for 'Créer une annonce' -->
            <a href="{{ route('annonce.create') }}" class="bg-blue-500 text-white px-6 py-4 rounded-lg text-lg font-medium shadow-md hover:bg-blue-600 transition duration-200">Créer une annonce</a>
        @else
            <a href="{{ route('login') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg text-lg font-medium shadow-md hover:bg-blue-600 transition duration-200">Connexion</a>
        @endauth
    </div>
    
    <div class="container mx-auto p-6">
        @yield('content')
    </div>
</body>
</html>
