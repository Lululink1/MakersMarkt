<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Verwerkt de bestelling.
     */
    public function process(Request $request)
    {
        // Valideer formuliergegevens
        $validated = $request->validate([
            'email' => 'required|email',
            'full_name' => 'required|string|max:255',
            'house_number' => 'required|string|max:10',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'shipping' => 'required|string',     // ✅ verzendmethode verplicht
            'payment' => 'required|string',      // ✅ betaalmethode verplicht
        ]);

        // Haal ingelogde gebruiker op
        $user = Auth::user();

        // Update gebruikersgegevens indien gewijzigd
        $user->update([
            'email' => $validated['email'],
            'full_name' => $validated['full_name'],
            'house_number' => $validated['house_number'],
            'city' => $validated['city'],
            'postal_code' => $validated['postal_code'],
        ]);

        // Order aanmaken inclusief verzend- en betaalmethode
        Order::create([
            'user_id' => $user->id,
            'status' => 'In behandeling',
            'description' => 'Bestelling door ' . $user->full_name,
            'shipping_method' => $validated['shipping'],
            'payment_method' => $validated['payment'],
            'date' => Carbon::now(),
        ]);

        // Redirect naar success-pagina
        return redirect()->route('order.success');
    }

    /**
     * Toon overzicht van eigen bestellingen (tracking).
     */
    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('orders.track', compact('orders'));
    }
}
