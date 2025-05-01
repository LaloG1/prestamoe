<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    // En tu método store del PagoController
public function store(Request $request)
{
    $request->validate([
        'prestamo_id' => 'required|exists:prestamos,id',
        'cliente_id' => 'required|exists:clientes,id',
        'fecha_pago' => 'required|date',
    ]);

    $prestamo = Prestamo::find($request->prestamo_id);
    $tipoPago = null;
    $monto = null;

    if ($request->has('interes')) {
        $tipoPago = 'interes';
        $monto = $request->interes;
    } elseif ($request->has('abono')) {
        $tipoPago = 'abono';
        $monto = $request->abono;
        
        // Validar que el abono no sea mayor al monto pendiente
        if ($monto > $prestamo->monto) {
            return back()->with('error', 'El abono no puede ser mayor al monto pendiente');
        }
        
        // Actualizar el monto del préstamo
        $prestamo->monto -= $monto;
        $prestamo->save();
    } elseif ($request->has('liquidar')) {
        $tipoPago = 'liquidar';
        $monto = $request->liquidar;
        
        // Marcar el préstamo como pagado
        $prestamo->estado = 'pagado';
        $prestamo->monto = 0;
        $prestamo->save();
    }

    // Crear el pago
    $pago = Pago::create([
        'prestamo_id' => $request->prestamo_id,
        'cliente_id' => $request->cliente_id,
        'monto' => $monto,
        'tipo_pago' => $tipoPago,
        'fecha_pago' => $request->fecha_pago,
    ]);

    return redirect()->back()->with('success', 'Pago registrado exitosamente');
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
