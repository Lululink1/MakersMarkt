@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-light">← Terug</a>

        <div class="row">
            <!-- Items Overzicht -->
            <div class="col-md-6">
                <h2>Items bekijken</h2>
                <div class="cart-item">
                    <img src="https://via.placeholder.com/100" alt="Product">
                    <span>Productnaam</span>
                    <span class="price">$31</span>
                    <p>Aantal: 1</p>
                </div>

                <h4>Beschikbare bezorgopties</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="shipping" id="postnl" checked>
                    <label class="form-check-label" for="postnl">PostNL - Gratis</label>
                </div>

                <h4>Betaalopties</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="ideal" checked>
                    <label class="form-check-label" for="ideal">iDeal</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="paypal">
                    <label class="form-check-label" for="paypal">PayPal</label>
                </div>
            </div>

            <!-- Betaalgegevens -->
            <div class="col-md-6">
                <h2>Betaal details</h2>
                <form action="{{ route('order.process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Adres</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="full_name" class="form-label">Volledige Naam</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="house_number" class="form-label">Huisnummer</label>
                        <input type="text" class="form-control" id="house_number" name="house_number" required>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Plaats</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>

                    <div class="mb-3">
                        <label for="postal_code" class="form-label">Postcode</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Betaling voltooien</button>
                </form>
            </div>
        </div>
    </div>
@endsection
