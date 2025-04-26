<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|min:0.01',
            'fecha_pago' => 'required|date',
            'prestamo_id' => 'required|exists:prestamos,id',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        $pago = Pago::create($request->only('monto', 'fecha_pago', 'prestamo_id', 'cliente_id'));

        // Verificar si el préstamo se ha pagado totalmente
        $prestamo = Prestamo::find($request->prestamo_id);
        $totalPagado = $prestamo->pagos()->sum('monto');
        $totalPrestamo = $prestamo->monto + ($prestamo->monto * $prestamo->interes / 100);

        if ($totalPagado >= $totalPrestamo) {
            $prestamo->estado = 'pagado';
            $prestamo->save();
        }

        return redirect()->route('prestamos.show', $prestamo)->with('success', 'Pago registrado correctamente.');
    }

    public function destroy(Pago $pago)
    {
        $prestamo = $pago->prestamo;
        $pago->delete();

        $totalPagado = $prestamo->pagos()->sum('monto');
        $totalPrestamo = $prestamo->monto + ($prestamo->monto * $prestamo->interes / 100);

        if ($totalPagado < $totalPrestamo && $prestamo->estado === 'pagado') {
            $prestamo->estado = 'pendiente';
            $prestamo->save();
        }

        return redirect()->route('prestamos.show', $prestamo)->with('success', 'Pago eliminado correctamente.');
    }
}
