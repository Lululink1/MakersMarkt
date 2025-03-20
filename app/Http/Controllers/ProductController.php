<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the product page with popular and new products.
     */
    public function index()
    {
        // Populaire producten ophalen (de eerste 3)
        $popularProducts = Product::limit(3)->get();

        // Nieuwe producten ophalen, gesorteerd op creatiedatum (de laatste 3)
        $newProducts = Product::orderBy('created_at', 'desc')->limit(3)->get();

        // Voorbeeld van categorieën (je kunt dit later dynamisch maken)
        $categories = [
            'Handmade Crafts & Decor',
            'Digital & Printable Products',
            'Eco-Friendly & Sustainable Goods'
        ];

        // Stuur de producten en categorieën naar de view
        return view('welcome', compact('popularProducts', 'newProducts', 'categories'));
    }
}
