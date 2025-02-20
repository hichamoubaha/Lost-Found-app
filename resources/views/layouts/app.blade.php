<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
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
            <a href="{{ route('annonce.create') }}" class="bg-white text-blue-500 px-4 py-2 rounded">Créer une annonce</a>
        @else
            <a href="{{ route('login') }}" class="bg-white text-blue-500 px-4 py-2 rounded">Connexion</a>
        @endauth
    </div>
    <div class="container mx-auto p-6">
        @yield('content')
    </div>
</body>
</html>
