@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Cliente</h2>
    <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
    <p><strong>Notas:</strong> {{ $cliente->notas }}</p>

    <hr>
    <h4>Préstamos</h4>
    <a href="{{ route('prestamos.create', ['cliente_id' => $cliente->id]) }}" class="btn btn-sm btn-primary mb-2">Nuevo Préstamo</a>
    <ul>
        @foreach ($cliente->prestamos as $prestamo)
            <li>
                <a href="{{ route('prestamos.show', $prestamo) }}">
                    {{ $prestamo->monto }} - {{ $prestamo->estado }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
