@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Producten</h1>

        <form action="{{ route('producten.index') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-1 bg-gray-100 rounded-lg p-4">
                    <h2 class="font-semibold mb-2">Filter</h2>
                    <div class="mb-3">
                        <label for="category" class="block text-sm font-medium text-gray-700">Categorie</label>
                        <select id="category" name="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Alle</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->Name }}" {{ request('category') == $category->Name ? 'selected' : '' }}>
                                    {{ $category->Name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="production_time" class="block text-sm font-medium text-gray-700">Duur van maken</label>
                        <select id="production_time" name="production_time" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Alle</option>
                            <option value="Kort" {{ request('production_time') == 'Kort' ? 'selected' : '' }}>Kort</option>
                            <option value="Gemiddeld" {{ request('production_time') == 'Gemiddeld' ? 'selected' : '' }}>Gemiddeld</option>
                            <option value="Lang" {{ request('production_time') == 'Lang' ? 'selected' : '' }}>Lang</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="material" class="block text-sm font-medium text-gray-700">Materiaal</label>
                        <div class="mt-1">
                            <input type="checkbox" id="hout" name="material[]" value="Hout" class="form-checkbox h-4 w-4 text-indigo-600 rounded" {{ in_array('Hout', request()->input('material', [])) ? 'checked' : '' }}>
                            <label for="hout" class="ml-2 text-sm text-gray-700">Hout</label>
                        </div>
                        <div class="mt-1">
                            <input type="checkbox" id="metaal" name="material[]" value="Metaal" class="form-checkbox h-4 w-4 text-indigo-600 rounded" {{ in_array('Metaal', request()->input('material', [])) ? 'checked' : '' }}>
                            <label for="metaal" class="ml-2 text-sm text-gray-700">Metaal</label>
                        </div>
                        <div class="mt-1">
                            <input type="checkbox" id="stof" name="material[]" value="Stof" class="form-checkbox h-4 w-4 text-indigo-600 rounded" {{ in_array('Stof', request()->input('material', [])) ? 'checked' : '' }}>
                            <label for="stof" class="ml-2 text-sm text-gray-700">Stof</label>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Filter</button>
                    </div>
                </div>

                <div class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($products as $product)
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <div class="h-40 bg-gray-200 rounded mb-2">
                                {{-- Hier komt de afbeelding later --}}
                            </div>
                            <h3 class="font-semibold mb-1">{{ $product->Name }}</h3>
                            <p class="text-gray-600 text-sm mb-1">€{{ number_format($product->Price, 2, ',', '.') }}</p>
                            <a href="{{ route('producten.show', $product->ProductId) }}" class="text-blue-500 hover:underline text-sm">Bekijk Details</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </form>

        {{-- {{ $products->links() }} --}}

    </div>
@endsection
