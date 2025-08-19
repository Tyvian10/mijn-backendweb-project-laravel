<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $news->titel }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8">
                    <!-- Titre de l'actualité -->
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                        {{ $news->titel }}
                    </h1>
                    
                    <!-- Informations sur l'article -->
                    <div class="text-sm text-gray-500 mb-6 border-b pb-4">
                        <p>📅 Publié le {{ $news->created_at->format('d/m/Y à H:i') }}</p>
                        @if($news->user)
                            <p>✍️ Par {{ $news->user->name }}</p>
                        @endif
                    </div>
                    
                    <!-- Contenu de l'actualité -->
                    <div class="prose prose-lg max-w-none text-gray-700 dark:text-gray-300">
                        {!! nl2br(e($news->nieuwsbericht)) !!}
                    </div>
                    
                    <!-- Actions pour admin -->
                    @auth
                        @if(auth()->user()->isAdmin())
                            <div class="mt-8 pt-6 border-t border-gray-200 flex space-x-4">
                                <a href="{{ route('admin.news.edit', $news) }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                                    ✏️ Modifier
                                </a>
                                <form action="{{ route('admin.news.destroy', $news) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded transition"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')">
                                        🗑️ Supprimer
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endauth
                    
                    <!-- Bouton retour -->
                    <div class="mt-8">
                        <a href="{{ route('news.index') }}" 
                           class="text-blue-600 hover:text-blue-800 transition">
                            ← Retour aux actualités
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>