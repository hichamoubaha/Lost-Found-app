<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lost & Found </title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-50">
    <div class="fixed top-0 right-0 p-6 flex gap-4 z-50">
        @auth
            <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-gray-700 bg-white rounded-md shadow-md hover:bg-blue-600 hover:text-white transition duration-300">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 bg-white rounded-md shadow-md hover:bg-blue-600 hover:text-white transition duration-300">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="px-4 py-2 text-gray-700 bg-white rounded-md shadow-md hover:bg-blue-600 hover:text-white transition duration-300">Register</a>
            @endif
        @endauth
    </div>

    <div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 to-indigo-700 text-white p-8">
        <h1 class="text-5xl font-semibold mb-4">Lost & Found</h1>
        <p class="text-lg mb-6 max-w-2xl text-center">Reuniting people with their lost items through our community-driven platform</p>
        
        <div class="w-full max-w-lg bg-white p-6 rounded-xl shadow-lg mb-6">
            <input type="text" class="w-full p-4 rounded-md text-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search for lost or found items...">
        </div>

        <div class="flex gap-4 mb-6">
            <a href="#" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-md shadow-md hover:bg-blue-700 transition duration-300">Report Lost Item</a>
            <a href="#" class="px-6 py-3 bg-white text-blue-600 font-bold rounded-md shadow-md hover:bg-blue-50 transition duration-300">Report Found Item</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 w-full max-w-screen-xl mb-8">
            <div class="bg-white p-6 rounded-xl shadow-lg text-center hover:transform hover:translate-y-2 transition duration-300">
                <i class="fas fa-search text-4xl text-blue-600 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Quick Search</h3>
                <p class="text-gray-600">Easily search through our database of lost and found items</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg text-center hover:transform hover:translate-y-2 transition duration-300">
                <i class="fas fa-map-marker-alt text-4xl text-blue-600 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Location Tracking</h3>
                <p class="text-gray-600">Track where items were lost or found with precise locations</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg text-center hover:transform hover:translate-y-2 transition duration-300">
                <i class="fas fa-bell text-4xl text-blue-600 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Instant Notifications</h3>
                <p class="text-gray-600">Get notified immediately when your item is found</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg text-center hover:transform hover:translate-y-2 transition duration-300">
                <i class="fas fa-handshake text-4xl text-blue-600 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Safe Returns</h3>
                <p class="text-gray-600">Secure and verified process for returning items</p>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-blue-600 text-white py-6">
        <div class="max-w-screen-xl mx-auto text-center">
            <p class="text-lg">© 2025 Lost & Found Hub. All Rights Reserved.</p>
            <div class="flex justify-center gap-6 mt-4">
                <a href="#" class="text-white hover:text-blue-200">Privacy Policy</a>
                <a href="#" class="text-white hover:text-blue-200">Terms of Service</a>
                <a href="#" class="text-white hover:text-blue-200">Contact Us</a>
            </div>
        </div>
    </footer>
</body>
</html>
