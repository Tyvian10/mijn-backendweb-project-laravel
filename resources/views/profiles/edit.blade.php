<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier mon profil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   value="{{ old('name', $user->name) }}">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   value="{{ old('email', $user->email) }}">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
    <label for="verjaardag" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date d'anniversaire</label>
    <input type="date" 
           name="verjaardag" 
           id="verjaardag" 
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
           value="{{ old('verjaardag', $user->verjaardag) }}">
    @error('verjaardag')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="over_mij" class="block text-sm font-medium text-gray-700 dark:text-gray-300">À propos de moi</label>
    <textarea name="over_mij" 
              id="over_mij" 
              rows="4"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
              placeholder="Parlez-nous un peu de vous...">{{ old('over_mij', $user->over_mij) }}</textarea>
    @error('over_mij')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="profielfoto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photo de profil</label>
    @if($user->profielfoto)
        <div class="mb-2">
            <img src="{{ Storage::url($user->profielfoto) }}" alt="Photo actuelle" class="w-20 h-20 rounded-full object-cover">
        </div>
    @endif
    <input type="file" 
           name="profielfoto" 
           id="profielfoto" 
           accept="image/*"
           class="mt-1 block w-full">
    @error('profielfoto')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
                        
                        <div class="flex justify-between">
                            <a href="{{ route('profile.show', $user) }}" 
                               class="bg-gray-500 text-white px-4 py-2 rounded">
                                Annuler
                            </a>
                            <button type="submit" 
                            class="bg-gray-500 text-white px-4 py-2 rounded">
                                Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>