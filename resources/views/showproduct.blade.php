@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="h-40 md:h-64 bg-gray-200 rounded mb-4">
                        {{-- Hier komt de afbeelding van het product --}}
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-semibold mb-2">{{ $product->Name }}</h1>
                    <p class="text-gray-700 mb-4">{{ $product->Description }}</p>
                    <p class="text-gray-600 mb-2">**Materiaal:** {{ $product->Material }}</p>
                    <p class="text-gray-600 mb-2">**Productietijd:** {{ $product->ProductionTime->diffForHumans() }}</p>
                    <p class="text-gray-600 mb-4">**Duurzaamheid:** {{ $product->Sustainability }}</p>
                    <p class="text-xl font-bold text-green-600 mb-4">€{{ number_format($product->Price, 2, ',', '.') }}</p>
                    {{-- Hier komt later de "Toevoegen aan winkelwagen" knop --}}
                    <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Toevoegen aan Winkelwagen</button>
                </div>
            </div>
        </div>
    </div>
@endsection
