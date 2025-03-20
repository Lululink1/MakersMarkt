@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Productaanvragen</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 py-2 px-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (isset($requests) && !$requests->isEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($requests as $product)
                    <div class="bg-white shadow-md rounded-md overflow-hidden">
                        @if ($product->images && count($product->images) > 0)
                            <img src="{{ url(str_replace('storage/', 'storage/', $product->images[0])) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                                <span class="text-gray-500">Geen afbeelding</span>
                            </div>
                        @endif

                        <div class="p-4">
                            <h2 class="text-lg font-semibold mb-2">{{ $product->name }}</h2>
                            <p class="text-gray-600 mb-2">{{ Str::limit($product->description, 100) }}</p>
                            <p class="text-gray-700 font-bold">€ {{ number_format($product->price, 2) }}</p>
                            <p class="text-gray-700">Categorie: {{ $product->category }}</p>
                            <p class="text-gray-700">Materiaal: {{ $product->material }}</p>
                            <p class="text-gray-700">Productietijd: {{ $product->production_time ? $product->production_time->format('Y-m-d H:i') : 'Niet opgegeven' }}</p>
                            <p class="text-gray-700">Duurzaamheid: {{ $product->sustainability }}</p>
                            <p class="text-gray-700">Voorraad: {{ $product->stock }}</p>
                            <p class="text-gray-700">Status: {{ $product->status }}</p>

                            <div class="mt-4">
                                <a href="{{ route('products.approve', $product) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-sm">
                                    Goedkeuren
                                </a>
                                <a href="{{ route('products.reject', $product) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-sm ml-2">
                                    Afwijzen
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $requests->links() }}
            </div>
        @else
            <p>Geen openstaande productaanvragen.</p>
        @endif
    </div>
@endsection