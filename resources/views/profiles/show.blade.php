<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Profil de {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- Photo et informations principales -->
                    <div class="flex items-center space-x-6 mb-6">
                        @if($user->profielfoto)
                            <img src="{{ Storage::url($user->profielfoto) }}" alt="Photo de profil" class="w-20 h-20 rounded-full object-cover">
                        @else
                            <div class="w-20 h-20 bg-gray-300 rounded-full flex items-center justify-center">
                                <span class="text-gray-600 text-2xl font-bold">{{ substr($user->name, 0, 1) }}</span>
                            </div>
                        @endif
                        
                        <div>
                            <h3 class="text-2xl font-bold">{{ $user->name }}</h3>
                            <p class="text-gray-600">{{ $user->email }}</p>
                            @if($user->verjaardag)
                                <p class="text-sm text-gray-500">Né(e) le {{ \Carbon\Carbon::parse($user->verjaardag)->format('d/m/Y') }}</p>
                            @endif
                            <p class="text-sm text-gray-500">Membre depuis {{ $user->created_at->format('F Y') }}</p>
                            @if($user->isAdmin())
                                <span class="inline-block bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full mt-2">
                                    Administrateur
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Section "À propos" -->
                    @if($user->over_mij)
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold mb-2">À propos</h4>
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                <p class="text-gray-700 dark:text-gray-300">{{ $user->over_mij }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Boutons d'action -->
                    @if(auth()->check() && auth()->id() === $user->id)
                        <div class="mt-6">
                            <a href="{{ route('profile.edit') }}" 
                               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                                Modifier mon profil
                            </a>
                        </div>
                    @endif

                    <!-- Activité récente -->
                    <div class="mt-8">
                        <h4 class="text-lg font-semibold mb-4">Activité récente</h4>
                        <div class="space-y-3">
                            @if($user->news && $user->news->count() > 0)
                                @foreach($user->news()->latest()->take(3)->get() as $news)
                                    <div class="border-l-4 border-blue-500 pl-4">
                                        <a href="{{ route('news.show', $news) }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $news->titel }}
                                        </a>
                                        <p class="text-sm text-gray-500">{{ $news->created_at->diffForHumans() }}</p>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-500">Aucune activité récente.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>