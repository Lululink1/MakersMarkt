@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mb-4">← Terug</a>

        <div class="row">
            <!-- Items Overzicht -->
            <div class="col-md-6">
                <h3 class="mb-3">Items bekijken</h3>

                @if(session('cart') && count(session('cart')) > 0)
                    @foreach(session('cart') as $item)
                        <div class="mb-4 border p-3 rounded">
                            <div class="d-flex align-items-center">
                                <img src="{{ $item['image'] }}" alt="Product" class="me-3" width="80">
                                <div>
                                    <p class="mb-1 fw-bold">{{ $item['name'] }}</p>
                                    <p class="mb-1 text-muted">Prijs: €{{ number_format($item['price'], 2) }}</p>
                                    <p class="mb-1">Aantal: {{ $item['quantity'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">Je winkelwagen is leeg.</p>
                @endif

                <h5 class="mt-4">Beschikbare bezorgopties</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="shipping" id="postnl" value="PostNL" form="orderForm"
                        checked>
                    <label class="form-check-label" for="postnl">PostNL - Gratis</label>
                </div>

                <h5 class="mt-3">Betaalopties</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="ideal" value="iDeal" form="orderForm"
                        checked>
                    <label class="form-check-label" for="ideal">iDeal</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="paypal" value="PayPal" form="orderForm">
                    <label class="form-check-label" for="paypal">PayPal</label>
                </div>
            </div>

            <!-- Betaalgegevens -->
            <div class="col-md-6">
                <h3 class="mb-3">Betaalgegevens</h3>
                <form action="{{ route('order.process') }}" method="POST" id="orderForm">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Emailadres</label>
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ old('email', auth()->user()->email ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="full_name" class="form-label">Volledige naam</label>
                        <input type="text" class="form-control" name="full_name" id="full_name"
                            value="{{ old('full_name', auth()->user()->full_name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="house_number" class="form-label">Huisnummer</label>
                        <input type="text" class="form-control" name="house_number" id="house_number"
                            value="{{ old('house_number', auth()->user()->house_number ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Plaats</label>
                        <input type="text" class="form-control" name="city" id="city"
                            value="{{ old('city', auth()->user()->city ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="postal_code" class="form-label">Postcode</label>
                        <input type="text" class="form-control" name="postal_code" id="postal_code"
                            value="{{ old('postal_code', auth()->user()->postal_code ?? '') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Betaling voltooien</button>
                </form>
            </div>
        </div>
    </div>
@endsection
