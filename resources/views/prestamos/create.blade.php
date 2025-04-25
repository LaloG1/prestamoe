@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nuevo Préstamo</h2>

    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Cliente</label>
            <select name="cliente_id" class="form-control" required>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ request('cliente_id') == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Monto</label>
            <input type="number" step="0.01" name="monto" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Interés (%)</label>
            <input type="number" step="0.01" name="interes" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Estado</label>
            <select name="estado" class="form-control">
                <option value="pendiente">Pendiente</option>
                <option value="pagado">Pagado</option>
                <option value="atrasado">Atrasado</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Notas</label>
            <textarea name="notas" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
