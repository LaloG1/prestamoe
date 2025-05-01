<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as PDF; // Asegúrate de importar esta clase correctamente
use Illuminate\Support\Facades\Auth;
use App\Models\Prestamo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with('cliente')->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create(Request $request)
    {
        $clientes = Cliente::all();
        $cliente_id = $request->input('cliente_id'); // Para pasar el cliente desde el botón "Nuevo préstamo" en clientes.show
        return view('prestamos.create', compact('clientes', 'cliente_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'monto' => 'required|numeric|min:0',
            'interes' => 'required|numeric|min:0',
            'estado' => 'required|string|in:pendiente,pagado,atrasado',
            'notas' => 'nullable|string',
        ]);

        // 1. Crear el préstamo
        $prestamo = Prestamo::create($request->all());

        // 2. Obtener datos para el PDF
        $cliente = $prestamo->cliente;
        $user = Auth::user(); // Prestador autenticado
        $fecha = now();

        // 3. Generar PDF (sin descargar)
        $pdf = PDF::loadView('prestamos.contrato', compact('prestamo', 'cliente', 'user', 'fecha'));

        // Opcional: guardar PDF en disco
        // Storage::put("contratos/contrato_{$prestamo->id}.pdf", $pdf->output());

        // 4. Redirigir con mensaje de éxito
        return redirect()->route('prestamos.index')->with('success', 'Préstamo creado correctamente y contrato generado.');
    }

    public function show(Prestamo $prestamo)
    {
        $prestamo->load('cliente');
        return view('prestamos.show', compact('prestamo'));
    }

    // PrestamoController.php
    public function edit(Prestamo $prestamo)
    {
        $clientes = Cliente::all(); // Asegúrate de importar el modelo Cliente

        if (request()->ajax()) {
            return view('prestamos._form', compact('prestamo', 'clientes'));
        }

        return view('prestamos.edit', compact('prestamo', 'clientes'));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $request->validate([
            'monto' => 'required|numeric',
            'interes' => 'required|numeric',
            'estado' => 'required|string'
        ]);

        $prestamo->update([
            'monto' => $request->monto,
            'interes' => $request->interes,
            'estado' => $request->estado
        ]);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado correctamente.');
    }


    public function destroy(Prestamo $prestamo)
    {
        $prestamo->delete();
        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado correctamente');
    }

    public function vistaPreviaPDF(Prestamo $prestamo)
{
    $cliente = $prestamo->cliente;
    $user = Auth::user(); // El prestador
    $fecha = now();

    $pdf = Pdf::loadView('contratos.pdf', compact('prestamo', 'cliente', 'user', 'fecha'));

    return $pdf->stream("Contrato_prestamo_{$prestamo->id}.pdf"); // Esto lo muestra en el navegador
}
}
