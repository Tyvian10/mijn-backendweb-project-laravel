<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            FAQ - Questions Fréquentes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @auth
                @if(auth()->user()->isAdmin())
                    <div class="mb-6 flex space-x-4">
                        <a href="{{ route('admin.faqs.create') }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Ajouter une FAQ
                        </a>
                        <a href="{{ route('admin.categories.index') }}" 
                           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                            Gérer les catégories
                        </a>
                    </div>
                @endif
            @endauth

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($categories as $category)
                        @if($category->faqs->count() > 0)
                            <div class="mb-8">
                                <h3 class="text-xl font-bold mb-4 text-blue-600">{{ $category->nom }}</h3>
                                @if($category->description)
                                    <p class="text-gray-600 mb-4">{{ $category->description }}</p>
                                @endif
                                
                                @foreach($category->faqs as $faq)
                                    <div class="mb-6 p-4 border-l-4 border-blue-200 bg-gray-50 dark:bg-gray-700">
                                        <h4 class="text-lg font-semibold mb-2">Q: {{ $faq->vraag }}</h4>
                                        <p class="text-gray-700 dark:text-gray-300">R: {{ $faq->antwoord }}</p>
                                        
                                        @auth
                                            @if(auth()->user()->isAdmin())
                                                <div class="mt-3 text-sm">
                                                    <a href="{{ route('admin.faqs.edit', $faq) }}" class="text-blue-600 mr-3">Modifier</a>
                                                    <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600" onclick="return confirm('Êtes-vous sûr?')">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                    
                    @if($categories->sum(function($cat) { return $cat->faqs->count(); }) == 0)
                        <p>Aucune FAQ disponible pour le moment.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>