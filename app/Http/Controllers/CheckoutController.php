<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function cart()
{
    $cart = session()->get('cart', []);
    return view('cart', compact('cart'));
}


    public function checkout()
    {
        return view('checkout');
    }

    public function processOrder(Request $request)
    {
        // Hier zou je de order kunnen opslaan en redirecten naar een bevestigingspagina
        return redirect()->route('cart')->with('success', 'Bestelling is geplaatst!');
    }
    public function updateCart(Request $request, $id)
{
    $cart = session()->get('cart', []);

    foreach ($cart as &$item) {
        if ($item['id'] == $id) {
            if ($request->input('action') === 'increase') {
                $item['quantity']++;
            } elseif ($request->input('action') === 'decrease' && $item['quantity'] > 1) {
                $item['quantity']--;
            }
            break;
        }
    }

    session()->put('cart', $cart);
    return redirect()->route('cart');
}

public function removeCartItem($id)
{
    $cart = session()->get('cart', []);
    $cart = array_filter($cart, fn($item) => $item['id'] != $id);
    session()->put('cart', $cart);
    return redirect()->route('cart')->with('success', 'Item verwijderd uit winkelwagen.');
}

}
