@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h2>Bedankt voor je bestelling!</h2>
        <p>Je bestelling is succesvol verwerkt. Je ontvangt binnenkort een bevestiging per e-mail.</p>
        <a href="{{ route('orders.track') }}" class="btn btn-primary mt-3">Mijn bestellingen bekijken</a>
    </div>
@endsection
