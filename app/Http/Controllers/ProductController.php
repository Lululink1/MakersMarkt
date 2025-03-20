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

}
