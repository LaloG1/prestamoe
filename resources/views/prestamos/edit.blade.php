@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Préstamo</h2>

    <form action="{{ route('prestamos.update', $prestamo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Cliente</label>
            <select name="cliente_id" class="form-control" required>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $cliente->id == $prestamo->cliente_id ? 'selected' : '' }}>
                        {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Monto</label>
            <input type="number" step="0.01" name="monto" value="{{ $prestamo->monto }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Interés (%)</label>
            <input type="number" step="0.01" name="interes" value="{{ $prestamo->interes }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Estado</label>
            <select name="estado" class="form-control">
                <option value="pendiente" {{ $prestamo->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="pagado" {{ $prestamo->estado == 'pagado' ? 'selected' : '' }}>Pagado</option>
                <option value="atrasado" {{ $prestamo->estado == 'atrasado' ? 'selected' : '' }}>Atrasado</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Notas</label>
            <textarea name="notas" class="form-control">{{ $prestamo->notas }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
