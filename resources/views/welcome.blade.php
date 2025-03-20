@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center mt-6 px-4">

        <!-- Populaire Producten -->
        <h1 class="text-3xl font-bold mb-6">Populaire Producten</h1>

        <div class="bg-gray-100 py-6 px-4 rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($popularProducts as $product)
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <div class="w-full h-40 bg-gray-200 rounded-md overflow-hidden">
                            <img src="{{ $product->Image ?? 'https://picsum.photos/400/300?random=' . $product->id }}"
                                alt="{{ $product->Name }}" class="w-full h-full object-cover rounded-md">
                        </div>
                        <h2 class="text-lg font-semibold mt-4">{{ $product->Name }}</h2>
                        <p class="text-gray-600 text-sm mt-2">{{ $product->Description }}</p>

                        <div class="mt-4 text-sm text-gray-500">
                            <p>Prijs: €{{ number_format($product->Price, 2) }}</p>
                            <p>Materiaal: {{ $product->Material }}</p>
                            <p>Duurzaamheid: {{ $product->Sustainability }}</p>
                            <p>Voorraad: {{ $product->Stock }} stuks</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Categorieën -->
        <h2 class="text-2xl font-bold mt-10 mb-4">Categorieën</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <div class="w-full h-24 bg-blue-500 rounded-md flex items-center justify-center shadow-md">
                    <span class="text-xl font-semibold text-white">{{ $category->Name }}</span>
                </div>
            @endforeach
        </div>

        <!-- Nieuwe Producten -->
        <div class="bg-gray-300 py-10 mt-12">
            <h2 class="text-2xl font-bold">Net Binnen!</h2>
            <p class="text-gray-700">Bekijk onze nieuwste producten</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6 px-4">
                @foreach($newProducts as $product)
                    <div class="bg-white shadow-lg rounded-lg p-6 relative">
                        <div class="absolute top-0 left-0 bg-black text-white text-xs px-3 py-1 rounded-br-lg font-semibold">
                            NIEUW PRODUCT
                        </div>
                        <div class="w-full h-40 bg-gray-200 rounded-md overflow-hidden">
                            <img src="{{ $product->Image ?? 'https://picsum.photos/400/300?random=' . $product->id }}"
                                alt="{{ $product->Name }}" class="w-full h-full object-cover rounded-md">
                        </div>
                        <h2 class="text-lg font-semibold mt-4">{{ $product->Name }}</h2>
                        <p class="text-gray-600 text-sm mt-2">{{ $product->Description }}</p>

                        <div class="mt-4 text-sm text-gray-500">
                            <p>Prijs: €{{ number_format($product->Price, 2) }}</p>
                            <p>Materiaal: {{ $product->Material }}</p>
                            <p>Duurzaamheid: {{ $product->Sustainability }}</p>
                            <p>Voorraad: {{ $product->Stock }} stuks</p>
                        </div>

                        <button class="mt-4 bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition">
                            Koop nu
                        </button>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Word Verkoper Sectie -->
        <div class="mt-12 text-center">
            <h2 class="text-3xl font-bold">Wil jij ook verkopen?</h2>
            <p class="text-gray-700 mb-6">Word een MakersMarkt Verkoper!</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center justify-center">
                <div class="flex flex-col items-center">
                    <div class="bg-gray-200 rounded-lg p-4 w-20 h-20 flex items-center justify-center">
                        <span class="text-4xl text-gray-700">✏️</span>
                    </div>
                    <p class="bg-gray-200 px-3 py-1 rounded-md mt-3 text-sm">Maak wat je verkoopt</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-gray-200 rounded-lg p-4 w-20 h-20 flex items-center justify-center">
                        <span class="text-4xl text-gray-700">🔄</span>
                    </div>
                    <p class="bg-gray-200 px-3 py-1 rounded-md mt-3 text-sm">Bepaal zelf hoe vaak</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-gray-200 rounded-lg p-4 w-20 h-20 flex items-center justify-center">
                        <span class="text-4xl text-gray-700">❌</span>
                    </div>
                    <p class="bg-gray-200 px-3 py-1 rounded-md mt-3 text-sm">Stop wanneer je wilt</p>
                </div>
            </div>

            <button class="mt-6 mb-10 bg-black text-white px-6 py-2 rounded-md hover:bg-gray-800 transition">
                Word een Maker
            </button>
        </div>
    </div>
@endsection
