@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mb-4">← Terug</a>

        <h2 class="mb-4 fw-bold">Mijn Bestellingen</h2>

        @if($orders->isEmpty())
            <div class="alert alert-info">Je hebt nog geen bestellingen geplaatst.</div>
        @else
            @foreach($orders as $order)
                <div class="card mb-4 shadow-sm border-0">
                    <div class="row g-0 align-items-center p-4">

                        <!-- Productafbeelding en info -->
                        <div class="col-md-2 text-center">
                            <img src="https://via.placeholder.com/100" class="img-fluid rounded mb-2" alt="Product">
                            <h6 class="mb-0 fw-bold">Product</h6>
                            <small class="text-muted">€31</small>
                        </div>

                        <!-- Klantgegevens -->
                        <div class="col-md-5">
                            <h6 class="fw-semibold mb-2">Klantgegevens bekijken:</h6>

                            @if($order->user)
                                <ul class="list-unstyled mb-0 small">
                                    <li><strong>Naam:</strong> {{ $order->user->full_name ?? '-' }}</li>
                                    <li><strong>Email:</strong> {{ $order->user->email ?? '-' }}</li>
                                    <li><strong>Adres:</strong>
                                        {{ $order->user->house_number ?? '-' }},
                                        {{ $order->user->postal_code ?? '-' }}
                                        {{ $order->user->city ?? '-' }}
                                    </li>
                                </ul>
                            @else
                                <div class="text-danger small">Gebruiker niet gevonden bij deze bestelling.</div>
                            @endif
                        </div>

                        <!-- Orderstatus -->
                        <div class="col-md-3 text-center">
                            <p class="mb-1 fw-semibold">Status:</p>
                            <span class="badge bg-info text-dark px-3 py-2">{{ $order->status }}</span>
                        </div>

                        <!-- Actieknoppen -->
                        <div class="col-md-2 text-end">
                            <a href="#" class="btn btn-outline-primary btn-sm mb-2 w-100">Aanpassen</a>
                            @if($order->status === 'In behandeling')
                                <a href="#" class="btn btn-outline-danger btn-sm w-100">Annuleren</a>
                            @elseif($order->status === 'Onderweg')
                                <a href="#" class="btn btn-outline-success btn-sm w-100">Track & Trace</a>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
