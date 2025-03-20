@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-6">
        <a href="{{ url()->previous() }}" class="text-blue-500 hover:underline mb-4 inline-block">← Terug</a>

        <h2 class="text-2xl font-bold mb-6">Mijn Winkelwagen</h2>

        @if(count($cart) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
                            <th class="p-4 border-b">Product</th>
                            <th class="p-4 border-b">Prijs</th>
                            <th class="p-4 border-b">Hoeveelheid</th>
                            <th class="p-4 border-b">Totaal</th>
                            <th class="p-4 border-b">Verwijderen</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        @foreach($cart as $item)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-4 flex items-center gap-3">
                                    <img src="{{ !empty($item['image']) ? $item['image'] : 'https://picsum.photos/100?random=' . ($item['id'] ?? rand(1, 1000)) }}"
                                        alt="{{ $item['name'] }}" class="w-14 h-14 object-cover rounded border">
                                    <span>{{ $item['name'] }}</span>
                                </td>

                                <td class="p-4">€{{ number_format($item['price'], 2) }}</td>
                                <td class="p-4">
                                    <form method="POST" action="{{ route('cart.update', $item['id']) }}"
                                        class="flex items-center space-x-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" name="action" value="decrease"
                                            class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded">−</button>
                                        <span class="min-w-[20px] text-center">{{ $item['quantity'] }}</span>
                                        <button type="submit" name="action" value="increase"
                                            class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded">+</button>
                                    </form>
                                </td>
                                <td class="p-4">€{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                <td class="p-4">
                                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                                            Verwijder
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex flex-wrap justify-between mt-6 gap-3">
                <a href="{{ route('checkout') }}"
                    class="inline-block px-6 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                    Ga Naar Afrekenen
                </a>
                <a href="{{ route('shop') }}"
                    class="inline-block px-6 py-2 bg-gray-300 text-gray-800 font-semibold rounded hover:bg-gray-400 transition">
                    Terug naar de winkel
                </a>
            </div>
        @else
            <p class="text-gray-600">Je winkelwagen is leeg.</p>
            <a href="{{ route('shop') }}"
                class="inline-block mt-4 px-6 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                Ga naar de winkel
            </a>
        @endif
    </div>
@endsection
