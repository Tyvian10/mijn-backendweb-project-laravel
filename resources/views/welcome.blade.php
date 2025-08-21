<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profils des utilisateurs</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50">
        <!-- Header simple -->
        <header class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <h1 class="text-xl font-semibold text-gray-900">Ma Platforme</h1>
                    
                    @if (Route::has('login'))
                        <nav class="flex space-x-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-blue-600 hover:text-blue-800 px-3 py-1 rounded">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800 px-3 py-1">
                                    Connexion
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">
                                        Inscription
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </header>

        <!-- Section profils uniquement -->
        <main class="py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <p class="text-gray-600">Tous les profils sont accessibles publiquement</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($users as $user)
                        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition duration-200">
                            @if($user->profielfoto)
                                <img src="{{ Storage::url($user->profielfoto) }}" alt="{{ $user->name }}" class="w-16 h-16 rounded-full mx-auto mb-3 object-cover">
                            @else
                                <div class="w-16 h-16 bg-blue-500 rounded-full mx-auto mb-3 flex items-center justify-center">
                                    <span class="text-white text-lg font-semibold">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                            @endif
                            
                            <h3 class="text-lg font-medium mb-2 text-gray-900">{{ $user->name }}</h3>
                            
                            @if($user->over_mij)
                                <p class="text-gray-600 text-sm mb-3">{{ Str::limit($user->over_mij, 80) }}</p>
                            @endif
                            
                            <a href="{{ route('profile.show', $user) }}" 
                               class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-150 text-sm">
                                Voir le profil
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </body>
</html>