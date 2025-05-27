<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuws Overzicht
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('news.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded mb-4 hover:bg-blue-700">
                Nieuw Bericht
            </a>

            @forelse ($news as $item)
                <div class="mb-4 p-4 bg-white dark:bg-gray-800 rounded shadow">
                    <h2 class="text-xl font-bold">{{ $item->titel }}</h2>
                    <p class="text-gray-700 dark:text-gray-300">{{ $item->nieuwsbericht }}</p>

                    <div class="mt-2 flex gap-4">
                        <a href="{{ route('news.show', $item->id) }}" class="text-indigo-600 hover:underline">Bekijk</a>
                        <a href="{{ route('news.edit', $item->id) }}" class="text-yellow-600 hover:underline">Bewerk</a>

                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Zeker weten?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Verwijder</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>Er zijn nog geen nieuwsberichten.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>