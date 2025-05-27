<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nieuws Overzicht
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('news.create') }}" class="btn btn-primary mb-4">Nieuw Bericht</a>
            @foreach ($news as $item)
                <div class="mb-4 p-4 bg-white dark:bg-gray-700 rounded shadow">
                    <h2 class="text-lg font-bold">{{ $item->titel }}</h2>
                    <p>{{ $item->nieuwsbericht }}</p>
                    <a href="{{ route('news.show', $item->id) }}">Bekijk</a> |
                    <a href="{{ route('news.edit', $item->id) }}">Bewerk</a>
                    <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Verwijder</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>