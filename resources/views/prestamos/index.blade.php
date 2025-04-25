@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Préstamos</h2>
    <a href="{{ route('prestamos.create') }}" class="btn btn-primary mb-3">Nuevo Préstamo</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Monto</th>
                <th>Interés (%)</th>
                <th>Interés generado ($)</th> <!-- Nueva columna -->
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->cliente->nombre }}</td>
                    <td>${{ number_format($prestamo->monto, 2) }}</td>
                    <td>{{ $prestamo->interes }}%</td>
                    <td>
                        ${{ number_format($prestamo->monto * ($prestamo->interes / 100), 2) }}
                    </td>
                    <td>{{ ucfirst($prestamo->estado) }}</td>
                    <td>
                        <a href="{{ route('prestamos.show', $prestamo) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('prestamos.edit', $prestamo) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
