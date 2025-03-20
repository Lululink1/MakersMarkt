@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Nieuw Product Toevoegen</h1>

        <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-md p-6">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Naam:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Beschrijving:</label>
                <textarea id="description" name="description" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Categorie:</label>
                <input type="text" id="category" name="category" value="{{ old('category') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('category')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="material" class="block text-gray-700 text-sm font-bold mb-2">Materiaal:</label>
                <input type="text" id="material" name="material" value="{{ old('material') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('material')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="production_time" class="block text-gray-700 text-sm font-bold mb-2">Productietijd:</label>
                <input type="datetime-local" id="production_time" name="production_time" value="{{ old('production_time') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('production_time')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="sustainability" class="block text-gray-700 text-sm font-bold mb-2">Duurzaamheid:</label>
                <input type="text" id="sustainability" name="sustainability" value="{{ old('sustainability') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('sustainability')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Prijs:</label>
                <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('price')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">Voorraad:</label>
                <input type="number" id="stock" name="stock" value="{{ old('stock', 1) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('stock')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="specifications" class="block text-gray-700 text-sm font-bold mb-2">Specificaties (bijv. kleur:rood, afmetingen:10x10):</label>
                <textarea id="specifications" name="specifications_text" rows="3" placeholder="Elke specificatie op een nieuwe regel in de vorm 'naam:waarde'" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('specifications_text') }}</textarea>
                <small class="text-gray-500">Formaat: naam:waarde (één per regel)</small>
                @error('specifications')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="images" class="block text-gray-700 text-sm font-bold mb-2">Afbeeldingen (meerdere selectie mogelijk):</label>
                <input type="file" id="images" name="images[]" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('images.*')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Opslaan
                </button>
                <a href="{{ route('portfolio.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Annuleren
                </a>
            </div>
        </form>
    </div>
@endsection