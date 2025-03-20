@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-6">
        <a href="{{ url()->previous() }}" class="text-blue-600 hover:underline mb-4 inline-block">← Terug</a>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Items Overzicht -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Items bekijken</h2>

                @if(session('cart') && count(session('cart')) > 0)
                    @foreach(session('cart') as $item)
                        <div class="mb-4 border border-gray-200 rounded-lg p-4 flex gap-4 items-center shadow-sm bg-white">
                            <div class="mb-4 border border-gray-200 rounded-lg p-4 flex gap-4 items-center shadow-sm bg-white">
                                <img src="{{ !empty($item['image']) ? $item['image'] : 'https://picsum.photos/100?random=' . ($item['id'] ?? rand(1, 1000)) }}"
                                    alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded">
                                <div>
                                    <h3 class="font-medium text-lg">{{ $item['name'] }}</h3>
                                    <p class="text-gray-600 text-sm">Prijs: €{{ number_format($item['price'], 2) }}</p>
                                    <p class="text-sm">Aantal: {{ $item['quantity'] }}</p>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-medium text-lg">{{ $item['name'] }}</h3>
                                <p class="text-gray-600 text-sm">Prijs: €{{ number_format($item['price'], 2) }}</p>
                                <p class="text-sm">Aantal: {{ $item['quantity'] }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500">Je winkelwagen is leeg.</p>
                @endif

                <h3 class="text-lg font-semibold mt-6 mb-2">Beschikbare bezorgopties</h3>
                <div class="space-y-2">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="shipping" value="PostNL" id="postnl" form="orderForm" checked
                            class="form-radio text-blue-600">
                        <span>PostNL - Gratis</span>
                    </label>
                </div>

                <h3 class="text-lg font-semibold mt-6 mb-2">Betaalopties</h3>
                <div class="space-y-2">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="payment" value="iDeal" id="ideal" form="orderForm" checked
                            class="form-radio text-blue-600">
                        <span>iDeal</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="payment" value="PayPal" id="paypal" form="orderForm"
                            class="form-radio text-blue-600">
                        <span>PayPal</span>
                    </label>
                </div>
            </div>

            <!-- Betaalgegevens -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Betaalgegevens</h2>

                <form action="{{ route('order.process') }}" method="POST" id="orderForm"
                    class="space-y-4 bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                    @csrf

                    <div>
                        <label for="email" class="block font-medium mb-1">Emailadres</label>
                        <input type="email" id="email" name="email"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('email', auth()->user()->email ?? '') }}" required>
                    </div>

                    <div>
                        <label for="full_name" class="block font-medium mb-1">Volledige naam</label>
                        <input type="text" id="full_name" name="full_name"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('full_name', auth()->user()->full_name ?? '') }}" required>
                    </div>

                    <div>
                        <label for="house_number" class="block font-medium mb-1">Huisnummer</label>
                        <input type="text" id="house_number" name="house_number"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('house_number', auth()->user()->house_number ?? '') }}" required>
                    </div>

                    <div>
                        <label for="city" class="block font-medium mb-1">Plaats</label>
                        <input type="text" id="city" name="city"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('city', auth()->user()->city ?? '') }}" required>
                    </div>

                    <div>
                        <label for="postal_code" class="block font-medium mb-1">Postcode</label>
                        <input type="text" id="postal_code" name="postal_code"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('postal_code', auth()->user()->postal_code ?? '') }}" required>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded transition">
                        Betaling voltooien
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
