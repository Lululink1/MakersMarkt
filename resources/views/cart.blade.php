@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-light">← Terug</a>

        <h2>Mijn Winkelwagen</h2>

        @if(count($cart) > 0)
            <div class="cart">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Prijs</th>
                            <th>Hoeveelheid</th>
                            <th>Totaal</th>
                            <th>Verwijderen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                            <tr>
                                <td>
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" width="60">
                                    <span>{{ $item['name'] }}</span>
                                </td>
                                <td>€{{ number_format($item['price'], 2) }}</td>
                                <td>
                                    <form method="POST" action="{{ route('cart.update', $item['id']) }}"
                                        style="display: flex; align-items: center;">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm btn-outline-secondary" name="action" value="decrease">-</button>
                                        <span class="mx-2">{{ $item['quantity'] }}</span>
                                        <button class="btn btn-sm btn-outline-secondary" name="action" value="increase">+</button>
                                    </form>
                                </td>
                                <td>€{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Verwijder</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="actions d-flex gap-2">
                    <a href="{{ route('checkout') }}" class="btn btn-primary">Ga Naar Afrekenen</a>
                    <a href="{{ route('shop') }}" class="btn btn-secondary">Terug naar de winkel</a>
                </div>
            </div>
        @else
            <p>Je winkelwagen is leeg.</p>
            <a href="{{ route('shop') }}" class="btn btn-primary">Ga naar de winkel</a>
        @endif
    </div>
@endsection
