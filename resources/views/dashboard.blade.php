<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <hr class="my-6">

    <h2 class="text-xl font-semibold mb-4">Laatste nieuwsberichten</h2>

    @forelse ($news as $item)
    <div class="mb-4 p-4 bg-gray-100 rounded shadow">
        <h3 class="text-lg font-bold">{{ $item->titel }}</h3>
        <p>{{ $item->nieuwsbericht }}</p>
    </div>
    @empty
    <p>Er zijn nog geen nieuwsberichten beschikbaar.</p>
    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
