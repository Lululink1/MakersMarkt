@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center mt-6 px-4">
                <!-- Populaire Producten -->
        <h1 class="text-3xl font-bold mb-6">Populaire Producten</h1>

        <div class="bg-gray-100 py-6 px-4 rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Product Card 1 -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="w-full h-40 bg-gray-300 rounded-md">
                        <!-- Gebruik een andere afbeelding URL om te testen -->
                        <img src="https://via.placeholder.com/400x300.png?text=Product+1" alt="" class="w-full h-full object-cover rounded-md">
                    </div>
                    <h2 class="text-lg font-semibold mt-4">Fitness PLanner</h2>
                    <p class="text-gray-600 text-sm mt-2">Een fantastisch product dat je leven gemakkelijker maakt.</p>
                </div>

                <!-- Product Card 2 -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="w-full h-40 bg-gray-300 rounded-md">
                        <!-- Gebruik een andere afbeelding URL om te testen -->
                        <img src="https://via.placeholder.com/400x300.png?text=Product+2" alt="" class="w-full h-full object-cover rounded-md">
                    </div>
                    <h2 class="text-lg font-semibold mt-4">E-books</h2>
                    <p class="text-gray-600 text-sm mt-2">Dit product biedt de perfecte oplossing voor dagelijks gebruik.</p>
                </div>

                <!-- Product Card 3 -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="w-full h-40 bg-gray-300 rounded-md">
                        <!-- Gebruik een andere afbeelding URL om te testen -->
                        <img src="https://via.placeholder.com/400x300.png?text=Product+3" alt="" class="w-full h-full object-cover rounded-md">
                    </div>
                    <h2 class="text-lg font-semibold mt-4">Sjablonen</h2>
                    <p class="text-gray-600 text-sm mt-2">Een innovatief product dat je niet wilt missen.</p>
                </div>
            </div>
        </div>
        <!-- Categorieën -->
        <div class="grid grid-cols-3 gap-6 mt-6">
            <!-- Categorie 1 -->
            <div class="w-full h-24 bg-blue-300 rounded-md flex items-center justify-center">
                <span class="text-xl font-semibold text-white">Elektronica</span>
            </div>

            <!-- Categorie 2 -->
            <div class="w-full h-24 bg-green-300 rounded-md flex items-center justify-center">
                <span class="text-xl font-semibold text-white">Kleding</span>
            </div>

            <!-- Categorie 3 -->
            <div class="w-full h-24 bg-red-300 rounded-md flex items-center justify-center">
                <span class="text-xl font-semibold text-white">Huis & Tuin</span>
            </div>
        </div>


        <!-- Net Binnen -->
<div class="bg-gray-300 py-8 mt-10">
    <h2 class="text-2xl font-bold">Net Binnen!</h2>
    <p class="text-gray-700">Bekijk onze nieuwste producten</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6 px-4">
        <!-- Nieuwe Product 1 -->
        <div class="bg-white shadow-lg rounded-lg p-6 relative">
            <div class="absolute top-0 left-0 bg-white px-3 py-1 text-xs font-bold rounded-full">NIEUW PRODUCT</div>
            <div class="w-full h-40 bg-gray-300 rounded-md">
                <!-- Voeg een voorbeeldafbeelding toe, bijvoorbeeld een placeholder -->
                <img src="https://via.placeholder.com/400x300.png?text=Eco+Waterfles" alt="" class="w-full h-full object-cover rounded-md">
            </div>
            <h2 class="text-lg font-semibold mt-4">Eco Waterfles 2.0</h2>
            <p class="text-gray-600 text-sm mt-2">Een herbruikbare waterfles gemaakt van gerecycled plastic, met een ingebouwd filter voor schoon water overal!</p>
            <button class="mt-4 bg-black text-white px-4 py-2 rounded">Buy now</button>
        </div>

        <!-- Nieuwe Product 2 -->
        <div class="bg-white shadow-lg rounded-lg p-6 relative">
            <div class="absolute top-0 left-0 bg-white px-3 py-1 text-xs font-bold rounded-full">NIEUW PRODUCT</div>
            <div class="w-full h-40 bg-gray-300 rounded-md">
                <!-- Voeg een voorbeeldafbeelding toe, bijvoorbeeld een placeholder -->
                <img src="https://via.placeholder.com/400x300.png?text=Slimme+Thermosfles" alt="" class="w-full h-full object-cover rounded-md">
            </div>
            <h2 class="text-lg font-semibold mt-4">Slimme Thermosfles</h2>
            <p class="text-gray-600 text-sm mt-2">Een thermosfles die de temperatuur van je drank regelt en je via een app waarschuwt wanneer het ideale moment is om te drinken.</p>
            <button class="mt-4 bg-black text-white px-4 py-2 rounded">Buy now</button>
        </div>

        <!-- Nieuwe Product 3 -->
        <div class="bg-white shadow-lg rounded-lg p-6 relative">
            <div class="absolute top-0 left-0 bg-white px-3 py-1 text-xs font-bold rounded-full">NIEUW PRODUCT</div>
            <div class="w-full h-40 bg-gray-300 rounded-md">
                <!-- Voeg een voorbeeldafbeelding toe, bijvoorbeeld een placeholder -->
                <img src="https://via.placeholder.com/400x300.png?text=Smart+Planner" alt="" class="w-full h-full object-cover rounded-md">
            </div>
            <h2 class="text-lg font-semibold mt-4">Smart Planner</h2>
            <p class="text-gray-600 text-sm mt-2">Een digitale planner die je helpt je taken en doelen bij te houden, met ingebouwde AI die je productiviteit verhoogt!</p>
            <button class="mt-4 bg-black text-white px-4 py-2 rounded">Buy now</button>
        </div>
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
@endsection
