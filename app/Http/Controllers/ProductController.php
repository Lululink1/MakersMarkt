<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $products = Auth::user()->products()->latest()->paginate(10);
        } else {
            $products = collect();
        }
        return view('portfolio', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'material' => 'nullable|string|max:255',
            'production_time' => 'nullable|date',
            'sustainability' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'specifications_text' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $productData = $request->except(['images', 'specifications_text']);
        $productData['user_id'] = Auth::id();

        if ($request->filled('specifications_text')) {
            $specifications = [];
            $lines = explode("\n", $request->input('specifications_text'));
            foreach ($lines as $line) {
                if (strpos($line, ':') !== false) {
                    list($key, $value) = explode(':', $line, 2);
                    $specifications[trim($key)] = trim($value);
                }
            }
            $productData['specifications'] = $specifications;
        } else {
            $productData['specifications'] = [];
        }

        $productData['status'] = 'pending';

        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $imagePaths[] = Storage::url($path);
            }
            $productData['images'] = $imagePaths;
        }

        Product::create($productData);

        return redirect()->route('portfolio.index')->with('success', 'Product toegevoegd, in afwachting van goedkeuring.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Je hebt geen toegang tot dit product.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'material' => 'nullable|string|max:255',
            'production_time' => 'nullable|date',
            'sustainability' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'specifications_text' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $productData = $request->except(['images', 'specifications_text']);

        if ($request->filled('specifications_text')) {
            $specifications = [];
            $lines = explode("\n", $request->input('specifications_text'));
            foreach ($lines as $line) {
                if (strpos($line, ':') !== false) {
                    list($key, $value) = explode(':', $line, 2);
                    $specifications[trim($key)] = trim($value);
                }
            }
            $productData['specifications'] = $specifications;
        } else {
            $productData['specifications'] = [];
        }

        if ($request->hasFile('images')) {
            if ($product->images) {
                foreach ($product->images as $oldImage) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $oldImage));
                }
            }
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $imagePaths[] = Storage::url($path);
            }
            $productData['images'] = $imagePaths;
        }

        $productData['status'] = 'pending_update';
        $product->update($productData);

        return redirect()->route('portfolio.index')->with('success', 'Update in afwachting van goedkeuring.');
    }

    public function destroy(Product $product)
    {
        if ($product->images) {
            foreach ($product->images as $image) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $image));
            }
        }

        $product->delete();

        return redirect()->route('portfolio.index')->with('success', 'Product succesvol verwijderd.');
    }

    public function approve(Product $product)
    {
        if (Auth::user()->role === 'admin') {
            $product->status = 'approved';
            $product->save();
            return redirect()->route('products.requests')->with('success', 'Product goedgekeurd.');
        }
        abort(403);
    }

    public function reject(Product $product)
    {
        if (Auth::user()->role === 'admin') {
            $product->status = 'rejected';
            $product->save();
            return redirect()->route('products.requests')->with('success', 'Product afgewezen.');
        }
        abort(403);
    }

    public function requests()
    {
        if (Auth::user()->role === 'admin') {
            $requests = Product::where('status', 'pending')
                ->orWhere('status', 'pending_update')
                ->latest()
                ->paginate(10);
            return view('products.requests', compact('requests'));
        }
        abort(403);
    }
}