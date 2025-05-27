<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FAQ Overzicht
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('faq.create') }}" class="btn btn-primary mb-4">Nieuwe FAQ</a>

            @foreach ($faqs as $faq)
            <a href="{{ route('faq.edit', $item->id) }}" class="text-blue-600">Bewerk</a>

            <form action="{{ route('faq.destroy', $item->id) }}" method="POST" style="display:inline;">
             @csrf
             @method('DELETE')
             <button type="submit" class="text-red-600">Verwijder</button>
            </form>
                <div class="bg-white p-4 rounded shadow mb-4">
                    <h2 class="text-lg font-bold">{{ $faq->vraag }}</h2>
                    <p>{{ $faq->antwoord }}</p>
                    <a href="{{ route('faq.edit', $faq->id) }}">Bewerk</a> |
                    <a href="{{ route('faq.show', $faq->id) }}">Bekijk</a>
                    <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Verwijder</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>