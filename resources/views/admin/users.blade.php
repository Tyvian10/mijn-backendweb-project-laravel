<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            👥 Gestion des Utilisateurs
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Liste des utilisateurs</h3>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <a href="{{ route('admin.users.create') }}" 
                            class="bg-gray-500 text-white px-4 py-2 rounded">
                            Créer un nouvel utilisateur
                        </a>
                    </div>

                    <div class="space-y-4">
                        @foreach($users as $user)
                            <div class="flex items-center justify-between p-4 border rounded">
                                <div>
                                    <h4 class="font-medium">{{ $user->name }}</h4>
                                    <p class="text-sm text-gray-600">{{ $user->email }}</p>
                                    <p class="text-xs text-gray-500">Inscrit le {{ $user->created_at->format('d/m/Y') }}</p>
                                </div>
                                
                                <div class="flex items-center space-x-4">
                                    @if($user->isAdmin())
                                        <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-sm">👑 Admin</span>
                                    @else
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm">👤 Utilisateur</span>
                                    @endif
                                    
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.role', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            
                                            @if($user->isAdmin())
                                                <input type="hidden" name="role" value="user">
                                                <button type="submit" class="text-orange-600 hover:text-orange-800 text-sm">
                                                    Rétrograder
                                                </button>
                                            @else
                                                <input type="hidden" name="role" value="admin">
                                                <button type="submit" class="text-blue-600 hover:text-blue-800 text-sm">
                                                    Promouvoir
                                                </button>
                                            @endif
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>