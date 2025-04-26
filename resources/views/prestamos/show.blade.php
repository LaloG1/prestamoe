@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Préstamo</h1>

    <div class="card mt-3">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($prestamo->estado === 'pagado')
                <div class="alert alert-success">
                    Este préstamo ha sido <strong>liquidado completamente</strong>.
                </div>
            @endif

            <p><strong>Cliente:</strong> {{ $prestamo->cliente->nombre }}</p>
            <p><strong>Monto:</strong> ${{ number_format($prestamo->monto, 2) }}</p>
            <p><strong>Interés:</strong> {{ $prestamo->interes }}%</p>
            <p><strong>Estado:</strong> {{ ucfirst($prestamo->estado) }}</p>
            <p><strong>Notas:</strong> {{ $prestamo->notas }}</p>

            <hr>

            @php
                $interesTotal = $prestamo->monto * ($prestamo->interes / 100);
            @endphp

            <p><strong>Interés semanal a pagar:</strong> ${{ number_format($interesTotal, 2) }}</p>

            <!-- Botón para abrir el modal -->
            <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#pagoModal">Registrar Pago</button>
            <a href="{{ route('prestamos.index') }}" class="btn btn-secondary mt-3">Volver</a>
        </div>
    </div>

    <!-- Modal de Pago -->
    <div class="modal fade" id="pagoModal" tabindex="-1" aria-labelledby="pagoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('pagos.store') }}">
                @csrf
                <input type="hidden" name="prestamo_id" value="{{ $prestamo->id }}">
                <input type="hidden" name="cliente_id" value="{{ $prestamo->cliente->id }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pagoModalLabel">Registrar Pago</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="monto" class="form-label">Monto del Pago</label>
                            <input type="number" name="monto" step="0.01" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_pago" class="form-label">Fecha de Pago</label>
                            <input type="date" name="fecha_pago" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar Pago</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Historial de Pagos -->
    <div class="card mt-4">
        <div class="card-body">
            <h4>Historial de Pagos</h4>

            @if ($prestamo->pagos->isEmpty())
                <p>No hay pagos registrados aún.</p>
            @else
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Monto</th>
                            <th>Fecha de Pago</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prestamo->pagos as $pago)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>${{ number_format($pago->monto, 2) }}</td>
                                <td>{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</td>
                                <td>
                                    <form action="{{ route('pagos.destroy', $pago) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este pago?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total Pagado</th>
                            <th colspan="3">${{ number_format($prestamo->pagos->sum('monto'), 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
