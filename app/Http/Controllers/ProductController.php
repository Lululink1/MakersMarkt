<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Toon de homepage met populaire en nieuwe producten.
     */
    public function index()
    {
        // Populaire producten (bijvoorbeeld de eerste 3)
        $popularProducts = Product::limit(3)->get();

        // Nieuwste producten op basis van aanmaakdatum
        $newProducts = Product::orderBy('created_at', 'desc')->limit(3)->get();

        // Categorieën ophalen (optioneel dynamisch maken met categorie-model)
        $categories = Category::all();

        return view('welcome', compact('popularProducts', 'newProducts', 'categories'));
    }

    /**
     * Toon gefilterde productlijst met zoekfilters.
     */
    public function browse(Request $request)
    {
        $query = Product::query()->with('category');
        $categories = Category::all();

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('Name', $request->category);
            });
        }

        if ($request->filled('material')) {
            $query->whereIn('Material', $request->material);
        }

        if ($request->filled('production_time')) {
            if ($request->production_time == 'Kort') {
                $query->where('ProductionTime', '<=', now()->subDays(3));
            } elseif ($request->production_time == 'Gemiddeld') {
                $query->whereBetween('ProductionTime', [now()->subDays(7), now()->subDays(4)]);
            } elseif ($request->production_time == 'Lang') {
                $query->where('ProductionTime', '>=', now()->subDays(8));
            }
        }

        $products = $query->get();

        return view('products', compact('products', 'categories'));
    }

    /**
     * Toon details van een enkel product.
     */
    public function show($productId)
    {
        $product = Product::with('category')->where('ProductId', $productId)->firstOrFail();
        return view('showproduct', compact('product'));
    }
}
