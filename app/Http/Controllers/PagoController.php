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
        'prestamo_id' => 'required|exists:prestamos,id',
        'cliente_id' => 'required|exists:clientes,id',
        'fecha_pago' => 'required|date',
    ]);

    // Determinar el tipo de pago y el monto
    $tipoPago = null;
    $monto = null;

    if ($request->has('interes')) {
        $tipoPago = 'interes';
        $monto = $request->interes;
    } elseif ($request->has('abono')) {
        $tipoPago = 'abono';
        $monto = $request->abono;
    } elseif ($request->has('liquidar')) {
        $tipoPago = 'liquidar';
        $monto = $request->liquidar;
    }

    if (!$tipoPago || !$monto) {
        return back()->with('error', 'Debe seleccionar un tipo de pago y especificar el monto');
    }

    // Crear el pago
    $pago = Pago::create([
        'prestamo_id' => $request->prestamo_id,
        'cliente_id' => $request->cliente_id,
        'monto' => $monto,
        'tipo_pago' => $tipoPago,
        'fecha_pago' => $request->fecha_pago,
    ]);

    // Verificar si el préstamo debe marcarse como pagado (si se liquidó)
    if ($tipoPago === 'liquidar') {
        $prestamo = Prestamo::find($request->prestamo_id);
        $prestamo->estado = 'pagado';
        $prestamo->save();
    }

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
