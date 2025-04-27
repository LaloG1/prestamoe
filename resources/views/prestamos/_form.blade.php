<form id="editPrestamoForm" action="{{ route('prestamos.update', $prestamo) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Cliente</label>
        <select name="cliente_id" class="form-control" required>
            @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ $cliente->id == $prestamo->cliente_id ? 'selected' : '' }}>
                {{ $cliente->nombre }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Monto</label>
            <input type="number" step="0.01" name="monto" value="{{ $prestamo->monto }}" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Interés (%)</label>
            <input type="number" step="0.01" name="interes" value="{{ $prestamo->interes }}" class="form-control" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Estado</label>
            <select name="estado" class="form-control">
                <option value="pendiente" {{ $prestamo->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="pagado" {{ $prestamo->estado == 'pagado' ? 'selected' : '' }}>Pagado</option>
                <option value="atrasado" {{ $prestamo->estado == 'atrasado' ? 'selected' : '' }}>Atrasado</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Fecha de Vencimiento</label>
            <input type="date" name="fecha_vencimiento" value="{{ $prestamo->fecha_vencimiento }}" class="form-control">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Notas</label>
        <textarea name="notas" class="form-control" rows="3">{{ $prestamo->notas }}</textarea>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
</form>