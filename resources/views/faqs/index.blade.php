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
                    <a href="{{ route('admin.faqs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                        Ajouter une FAQ
                    </a>
                @endif
            @endauth

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($faqs->count() > 0)
                        @foreach($faqs as $faq)
                            <div class="mb-6 p-4 border-b">
                                <h3 class="text-lg font-semibold mb-2">Q: {{ $faq->vraag }}</h3>
                                <p class="text-gray-700 dark:text-gray-300">R: {{ $faq->antwoord }}</p>
                                
                                @auth
                                    @if(auth()->user()->isAdmin())
                                        <div class="mt-3">
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
                    @else
                        <p>Aucune FAQ disponible pour le moment.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>