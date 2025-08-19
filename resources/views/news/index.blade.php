<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nieuws Overzicht
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.news.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nieuw Bericht</a>
                @endif
            @endauth
            
            @foreach ($news as $item)
                <div class="mb-4 p-4 bg-white dark:bg-gray-700 rounded shadow">
                    <h2 class="text-lg font-bold">{{ $item->titel }}</h2>
                    <p>{{ $item->nieuwsbericht }}</p>
                    <a href="{{ route('news.show', $item) }}" class="text-blue-600 hover:text-blue-800">Bekijk</a>

@auth
    @if(auth()->user()->isAdmin())
        | <a href="{{ route('admin.news.edit', $item) }}" class="text-blue-600 hover:text-blue-800">Bewerk</a>
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600" onclick="return confirm('Êtes-vous sûr?')">Verwijder</button>
                            </form>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>