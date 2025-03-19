@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center mt-6 px-4">

        <!-- Populaire Producten -->
        <h1 class="text-3xl font-bold mb-6">Populaire Producten</h1>

        <div class="bg-gray-100 py-6 px-4 rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Loop through popular products -->
                @foreach($popularProducts as $product)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="w-full h-40 bg-gray-300 rounded-md">
                        <!-- Display product image (you can add your image path here) -->
                        <img src="https://via.placeholder.com/400x300.png?text={{ $product->name }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-md">
                    </div>
                    <h2 class="text-lg font-semibold mt-4">{{ $product->Name }}</h2>
                    <p class="text-gray-600 text-sm mt-2">{{ $product->Description }}</p>

                    <!-- Product Details -->
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Prijs: €{{ number_format($product->Price, 2) }}</p>
                        <p class="text-sm text-gray-500">Materiaal: {{ $product->Material }}</p>
                        <p class="text-sm text-gray-500">Duurzaamheid: {{ $product->Sustainability }}</p>
                        <p class="text-sm text-gray-500">Voorraad: {{ $product->Stock }} stuks</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Categorieën -->
        <div class="grid grid-cols-3 gap-6 mt-6">
            @foreach($categories as $category)
            <div class="w-full h-24 bg-blue-300 rounded-md flex items-center justify-center">
                <span class="text-xl font-semibold text-white">{{ $category }}</span>
            </div>
            @endforeach
        </div>

        <!-- Net Binnen -->
        <div class="bg-gray-300 py-8 mt-10">
            <h2 class="text-2xl font-bold">Net Binnen!</h2>
            <p class="text-gray-700">Bekijk onze nieuwste producten</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6 px-4">
                <!-- Loop through new products -->
                @foreach($newProducts as $product)
                <div class="bg-white shadow-lg rounded-lg p-6 relative">
                    <div class="absolute top-0 left-0 bg-white px-3 py-1 text-xs font-bold rounded-full">NIEUW PRODUCT</div>
                    <div class="w-full h-40 bg-gray-300 rounded-md">
                        <!-- Display product image (you can add your image path here) -->
                        <img src="https://via.placeholder.com/400x300.png?text={{ $product->name }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-md">
                    </div>
                    <h2 class="text-lg font-semibold mt-4">{{ $product->Name }}</h2>
                    <p class="text-gray-600 text-sm mt-2">{{ $product->Description }}</p>

                    <!-- Product Details -->
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Prijs: €{{ number_format($product->Price, 2) }}</p>
                        <p class="text-sm text-gray-500">Materiaal: {{ $product->Material }}</p>
                        <p class="text-sm text-gray-500">Duurzaamheid: {{ $product->Sustainability }}</p>
                        <p class="text-sm text-gray-500">Voorraad: {{ $product->Stock }} stuks</p>
                    </div>

                    <button class="mt-4 bg-black text-white px-4 py-2 rounded">Koop nu</button>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Wil jij ook verkopen? -->
        <div class="mt-10 text-center">
            <h2 class="text-3xl font-bold">Wil jij ook verkopen?</h2>
            <p class="text-gray-700 mb-6">Word een MakersMarkt Verkoper!</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center justify-center">
                <!-- Kaart 1 -->
                <div class="flex flex-col items-center">
                    <div class="bg-gray-200 rounded-lg p-4 w-20 h-20 flex items-center justify-center">
                        <!-- Potlood Emoji -->
                        <span class="text-4xl text-gray-700">✏️</span>
                    </div>
                    <p class="bg-gray-200 px-3 py-1 rounded-md mt-3 text-sm">Maak wat je verkoopt</p>
                </div>

                <!-- Kaart 2 -->
                <div class="flex flex-col items-center">
                    <div class="bg-gray-200 rounded-lg p-4 w-20 h-20 flex items-center justify-center">
                        <!-- Herstart-pijl Emoji 🔄 -->
                        <span class="text-4xl text-gray-700">🔄</span>
                    </div>
                    <p class="bg-gray-200 px-3 py-1 rounded-md mt-3 text-sm">Kies hoe vaak en hoelang het duurt</p>
                </div>

                <!-- Kaart 3 -->
                <div class="flex flex-col items-center">
                    <div class="bg-gray-200 rounded-lg p-4 w-20 h-20 flex items-center justify-center">
                        <!-- X Emoji -->
                        <span class="text-4xl text-gray-700">❌</span>
                    </div>
                    <p class="bg-gray-200 px-3 py-1 rounded-md mt-3 text-sm">Kan stoppen wanneer je wilt</p>
                </div>
            </div>

            <!-- CTA-knop -->
            <button class="mt-6 mb-10 bg-black text-white px-6 py-2 rounded-md">Word een Maker</button>
        </div>
    </div>
@endsection
