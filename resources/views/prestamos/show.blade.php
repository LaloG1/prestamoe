@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Préstamo</h1>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Cliente:</strong> {{ $prestamo->cliente->nombre }}</p>
            <p><strong>Monto:</strong> ${{ number_format($prestamo->monto, 2) }}</p>
            <p><strong>Interés:</strong> {{ $prestamo->interes }}%</p>
            <p><strong>Estado:</strong> {{ ucfirst($prestamo->estado) }}</p>
            <p><strong>Notas:</strong> {{ $prestamo->notas }}</p>

            <hr>

            {{-- Cálculo del total de interés semanal --}}
            @php
                $interesTotal = $prestamo->monto * ($prestamo->interes / 100);
            @endphp

            <p><strong>Interés semanal a pagar:</strong> ${{ number_format($interesTotal, 2) }}</p>

            <a href="{{ route('prestamos.index') }}" class="btn btn-secondary mt-3">Volver</a>
        </div>
    </div>
</div>
@endsection
