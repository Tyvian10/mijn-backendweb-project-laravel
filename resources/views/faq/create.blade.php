<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuwe FAQ toevoegen
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        <form method="POST" action="{{ route('faq.store') }}">
            @csrf
            <div class="mb-4">
                <label for="vraag" class="block font-medium">Vraag:</label>
                <input type="text" name="vraag" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="antwoord" class="block font-medium">Antwoord:</label>
                <textarea name="antwoord" class="w-full border p-2 rounded" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</x-app-layout>