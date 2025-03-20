<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->with('category');

        $categories = Category::all();

        if ($request->has('category') && $request->category != '') {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('Name', $request->category);
            });
        }

        if ($request->has('material') && !empty($request->material)) {
            $query->whereIn('Material', $request->material);
        }

        if ($request->has('production_time') && $request->production_time != '') {
            if ($request->production_time == 'Kort') {
                $query->where('ProductionTime', '<=', now()->subDays(3));
            } elseif ($request->production_time == 'Gemiddeld') {
                $query->whereBetween('ProductionTime', [now()->subDays(7), now()->subDays(4)]);
            } elseif ($request->production_time == 'Lang') {
                $query->where('ProductionTime', '>=', now()->subDays(8));
            }
        }

        $products = $query->get();

        return view('products', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function show($productId)
    {
        $product = Product::with('category')->where('ProductId', $productId)->firstOrFail();
        return view('showproduct', ['product' => $product]);
    }

}

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
            'Elektronica',
            'Kleding',
            'Huis & Tuin'
        ];

        // Stuur de producten en categorieën naar de view
        return view('welcome', compact('popularProducts', 'newProducts', 'categories'));
    }
}
