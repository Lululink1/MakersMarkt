<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function process(Request $request)
    {
        // Valideer formuliergegevens
        $validated = $request->validate([
            'email' => 'required|email',
            'full_name' => 'required|string|max:255',
            'house_number' => 'required|string|max:10',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'shipping' => 'required|string',
            'payment' => 'required|string',
        ]);

        // Haal ingelogde gebruiker
        $user = Auth::user();

        // Update gebruikersgegevens
        $user->update([
            'email' => $validated['email'],
            'full_name' => $validated['full_name'],
            'house_number' => $validated['house_number'],
            'city' => $validated['city'],
            'postal_code' => $validated['postal_code'],
        ]);

        // Haal winkelwageninhoud op
        $cart = session()->get('cart', []);

        // Beschrijving van items opbouwen
        $description = '';
        foreach ($cart as $item) {
            $description .= $item['name'] . ' x' . $item['quantity'] . '; ';
        }

        // Order opslaan
        Order::create([
            'user_id' => $user->id,
            'seller_id' => null, // Optioneel: als je per item sellers hebt
            'status' => 'In behandeling',
            'description' => trim($description),
            'shipping_method' => $validated['shipping'],
            'payment_method' => $validated['payment'],
            'date' => Carbon::now(),
        ]);

        // Cart legen
        session()->forget('cart');

        // Redirect naar successpagina
        return redirect()->route('order.success')->with('success', 'Je bestelling is geplaatst!');
    }

    public function myOrders()
    {
        $orders = Order::with('user')->where('user_id', Auth::id())->latest()->get();
        return view('orders.track', compact('orders'));
    }
}
