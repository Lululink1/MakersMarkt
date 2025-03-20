<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Carbon\Carbon;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_place_an_order()
    {
        // Zorg dat UserSeeder wordt uitgevoerd
        $this->seed(\Database\Seeders\UserSeeder::class);

        // Haal een bestaande gebruiker op
        $user = User::where('email', 'admin@example.com')->first();

        // Simuleer cart in sessie
        $cart = [
            [
                'id' => 1,
                'name' => 'Test Product',
                'price' => 19.99,
                'quantity' => 2,
                'image' => null,
            ],
        ];

        // Voer POST request uit als ingelogde user
        $response = $this->actingAs($user)
            ->withSession(['cart' => $cart])
            ->post(route('order.process'), [
                'email' => $user->email,
                'full_name' => $user->full_name,
                'house_number' => $user->house_number,
                'city' => $user->city,
                'postal_code' => $user->postal_code,
                'shipping' => 'PostNL',
                'payment' => 'iDeal',
            ]);

        // Check redirect naar successpagina
        $response->assertRedirect(route('order.success'));

        // Check of order in de database zit
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'status' => 'In behandeling',
            'shipping_method' => 'PostNL',
            'payment_method' => 'iDeal',
        ]);
    }

    /** @test */
    public function guest_cannot_place_an_order()
    {
        $response = $this->post(route('order.process'), []);
        $response->assertRedirect(route('login'));
    }
}
