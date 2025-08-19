<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ajouter une FAQ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.faqs.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="vraag" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Question</label>
                            <input type="text" name="vraag" id="vraag" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        
                        <div class="mb-4">
                            <label for="antwoord" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Réponse</label>
                            <textarea name="antwoord" id="antwoord" required rows="4"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        </div>
                        
                        <div class="flex justify-between mt-6">
                <a href="{{ route('faqs.index') }}" 
                style="background-color: #6b7280; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; display: inline-block;">
                    Annuler
                </a>
                <button type="submit" 
                        style="background-color: #3b82f6; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">
                    Ajouter la FAQ
                </button>
            </div>
                        <div class="mt-4">
                            @if ($errors->any())
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Erreur!</strong>
                                    <ul class="list-disc pl-5">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>