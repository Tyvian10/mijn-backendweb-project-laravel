<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier mon profil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-4">Photo de profil</h3>
                            <div class="flex items-center space-x-6">
                                @if($user->profielfoto)
                                    <img src="{{ Storage::url($user->profielfoto) }}" alt="Photo actuelle" class="w-20 h-20 rounded-full object-cover">
                                @else
                                    <div class="w-20 h-20 bg-gray-300 rounded-full flex items-center justify-center">
                                        <span class="text-gray-600 text-xl">{{ substr($user->name, 0, 1) }}</span>
                                    </div>
                                @endif
                                
                                <div>
                                    <input type="file" name="profielfoto" id="profielfoto" accept="image/*" 
                                           class="block text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    <p class="text-sm text-gray-500 mt-1">JPG, PNG, GIF jusqu'à 2MB</p>
                                </div>
                            </div>
                            @error('profielfoto')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom d'utilisateur</label>
                            <input type="text" name="name" id="name" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   value="{{ old('name', $user->name) }}">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   value="{{ old('email', $user->email) }}">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="flex justify-between">
                            <a href="{{ route('profile.show', $user) }}" class="bg-gray-500 text-white px-4 py-2 rounded">
                                Voir mon profil
                            </a>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Sauvegarder les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>