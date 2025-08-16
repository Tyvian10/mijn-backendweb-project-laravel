<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuw Nieuwsbericht
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('news.store') }}" method="POST">
                @csrf
                <div>
                    <label for="titel">Titel:</label>
                    <input type="text" name="titel" id="titel" required>
                </div>
                <div>
                    <label for="nieuwsbericht">Bericht:</label>
                    <textarea name="nieuwsbericht" id="nieuwsbericht" required></textarea>
                </div>
                <button type="submit">Opslaan</button>
            </form>
        </div>
    </div>
</x-app-layout>