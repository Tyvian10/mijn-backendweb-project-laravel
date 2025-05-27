<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FAQ Detail
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-bold">{{ $faq->vraag }}</h2>
            <p>{{ $faq->antwoord }}</p>
            <a href="{{ route('faq.index') }}" class="text-blue-500">← Terug naar overzicht</a>
        </div>
    </div>
</x-app-layout>