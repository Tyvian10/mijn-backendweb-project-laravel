<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Messages de Contact Reçus
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($contacts->count() > 0)
                        @foreach($contacts as $contact)
                            @php
                                $data = json_decode($contact->formulier, true);
                            @endphp
                            <div class="mb-6 p-4 border border-gray-200 rounded">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-semibold">{{ $data['nom'] ?? 'Nom non spécifié' }}</h3>
                                    <span class="text-sm text-gray-500">{{ $contact->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <p class="text-sm text-gray-600 mb-2">Email: {{ $data['email'] ?? 'Email non spécifié' }}</p>
                                <p class="text-gray-700">{{ $data['message'] ?? 'Message vide' }}</p>
                            </div>
                        @endforeach
                    @else
                        <p>Aucun message de contact reçu.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>