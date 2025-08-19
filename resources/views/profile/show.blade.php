<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Profil de {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center space-x-6">
                        @if($user->profielfoto)
                            <img src="{{ Storage::url($user->profielfoto) }}" alt="Photo de profil" class="w-24 h-24 rounded-full object-cover">
                        @else
                            <div class="w-24 h-24 bg-gray-300 rounded-full flex items-center justify-center">
                                <span class="text-gray-600 text-2xl">{{ substr($user->name, 0, 1) }}</span>
                            </div>
                        @endif
                        
                        <div>
                            <h3 class="text-2xl font-bold">{{ $user->name }}</h3>
                            <p class="text-gray-600">Membre depuis {{ $user->created_at->format('F Y') }}</p>
                            @if($user->isAdmin())
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mt-2">
                                    Administrateur
                                </span>
                            @endif
                        </div>
                    </div>

                    @if(auth()->check() && auth()->id() === $user->id)
                        <div class="mt-6">
                            <a href="{{ route('profile.edit') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                                Modifier mon profil
                            </a>
                        </div>
                    @endif

                    <div class="mt-8">
                        <h4 class="text-lg font-semibold mb-4">Activité récente</h4>
                        <div class="space-y-3">
                            @foreach($user->news()->latest()->take(3)->get() as $news)
                                <div class="border-l-4 border-blue-500 pl-4">
                                    <a href="{{ route('news.show', $news) }}" class="text-blue-600 hover:text-blue-800">
                                        {{ $news->titel }}
                                    </a>
                                    <p class="text-sm text-gray-500">{{ $news->created_at->diffForHumans() }}</p>
                                </div>
                            @endforeach
                            
                            @if($user->news()->count() === 0)
                                <p class="text-gray-500">Aucune activité récente.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>