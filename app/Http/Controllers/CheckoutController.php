<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Toon de winkelwagenpagina.
     * Vul automatisch testdata als de cart leeg is (voor demo/doeleinden).
     */
    public function cart()
    {
        if (!session()->has('cart') || empty(session('cart'))) {
            // Testproducten toevoegen aan cart
            $cart = [
                [
                    'id' => 1,
                    'name' => 'Fitness Planner',
                    'price' => 29.99,
                    'quantity' => 2,
                    'image' => 'https://via.placeholder.com/100',
                ],
                [
                    'id' => 2,
                    'name' => 'E-books',
                    'price' => 19.99,
                    'quantity' => 1,
                    'image' => 'https://via.placeholder.com/100',
                ],
            ];
            session()->put('cart', $cart);
        }

        $cart = session('cart', []);
        return view('cart', compact('cart'));
    }

    /**
     * Checkoutpagina tonen.
     */
    public function checkout()
    {
        return view('checkout');
    }

    /**
     * Bestelling verwerken (placeholder).
     */
    public function processOrder(Request $request)
    {
        // Hier kun je de order opslaan in de database
        return redirect()->route('cart')->with('success', 'Bestelling is geplaatst!');
    }

    /**
     * Cart-item bijwerken (hoeveelheid verhogen/verlagen).
     */
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

    /**
     * Item uit de winkelwagen verwijderen.
     */
    public function removeCartItem($id)
    {
        $cart = session()->get('cart', []);
        $cart = array_filter($cart, fn($item) => $item['id'] != $id);
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Item verwijderd uit winkelwagen.');
    }

    /**
     * Product aan winkelwagen toevoegen (optioneel).
     */
    public function addToCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        // Check of het product al in cart zit
        $found = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity']++;
                $found = true;
                break;
            }
        }

        // Zo niet: voeg als nieuw toe (bijvoorbeeld dummy product)
        if (!$found) {
            $cart[] = [
                'id' => $id,
                'name' => 'Product ' . $id,
                'price' => 10.00,
                'quantity' => 1,
                'image' => 'https://via.placeholder.com/100',
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Product toegevoegd aan winkelwagen.');
    }
}
